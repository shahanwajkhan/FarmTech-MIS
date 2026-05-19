<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\CropPool;
use App\Models\FpoOrder;
use Illuminate\Foundation\Testing\WithFaker;

class CropPoolingTest extends TestCase
{
    public function test_farmer_can_pool_crop_and_fpo_can_aggregate_it()
    {
        // Clean up prior runs
        User::where('email', 'test_ramesh@farmtech.com')->delete();
        User::where('email', 'test_fpo@farmtech.com')->delete();
        CropPool::where('crop_type', 'Wheat')->delete();
        FpoOrder::where('product', 'Bulk Aggregated Wheat')->delete();

        // 1. Create a Farmer user
        $farmer = User::create([
            'name' => 'Test Ramesh',
            'email' => 'test_ramesh@farmtech.com',
            'mobile' => '9812349999',
            'password' => bcrypt('password'),
            'role' => 'farmer',
            'status' => 'active'
        ]);

        // 2. Post as Farmer to pool crop
        $response = $this->actingAs($farmer)->postJson('/farmer/crop-pool', [
            'crop_type' => 'Wheat',
            'quantity' => 80
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success'
        ]);

        // 3. Assert database has the pooled crop
        $pool = CropPool::where('user_id', $farmer->id)->first();
        $this->assertNotNull($pool);
        $this->assertEquals('Wheat', $pool->crop_type);
        $this->assertEquals(80, $pool->quantity);
        $this->assertEquals('Pooled', $pool->status);

        // 4. Create an FPO user
        $fpo = User::create([
            'name' => 'GreenHarvest FPO Test',
            'email' => 'test_fpo@farmtech.com',
            'mobile' => '9877011999',
            'password' => bcrypt('password'),
            'role' => 'fpo',
            'status' => 'active'
        ]);

        // 5. Post as FPO to aggregate
        $response2 = $this->actingAs($fpo)->postJson('/fpo/aggregate-crop', [
            'crop_type' => 'Wheat'
        ]);

        $response2->assertStatus(200);
        $response2->assertJson([
            'status' => 'success'
        ]);

        // 6. Assert pool entries updated
        $pool->refresh();
        $this->assertEquals('Aggregated & Sold', $pool->status);

        // 7. Assert FpoOrder is created
        $order = FpoOrder::where('product', 'Bulk Aggregated Wheat')->first();
        $this->assertNotNull($order);
        $this->assertEquals(80, $order->quantity);
        $this->assertEquals('Approved', $order->status);
        $this->assertEquals(80 * 2450, $order->order_value);

        // Clean up
        $farmer->delete();
        $fpo->delete();
        $pool->delete();
        $order->delete();
    }
}
