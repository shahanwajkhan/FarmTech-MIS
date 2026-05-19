<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fpo;
use App\Models\Shg;
use App\Models\Pacs;
use App\Models\Cooperative;

class DirectoryController extends Controller
{
    public function fpo(Request $request)
    {
        $query = Fpo::query();
        $this->applyFilters($query, $request);
        $items = $query->paginate(12);
        
        return view('directory.index', [
            'type' => 'fpo',
            'title' => 'FPO Directory',
            'items' => $items,
            'stats' => $this->getStats('fpo')
        ]);
    }

    public function shg(Request $request)
    {
        $query = Shg::query();
        $this->applyFilters($query, $request);
        $items = $query->paginate(12);
        
        return view('directory.index', [
            'type' => 'shg',
            'title' => 'SHG Directory',
            'items' => $items,
            'stats' => $this->getStats('shg')
        ]);
    }

    public function pacs(Request $request)
    {
        $query = Pacs::query();
        $this->applyFilters($query, $request);
        $items = $query->paginate(12);
        
        return view('directory.index', [
            'type' => 'pacs',
            'title' => 'PACS Directory',
            'items' => $items,
            'stats' => $this->getStats('pacs')
        ]);
    }

    public function cooperatives(Request $request)
    {
        $query = Cooperative::query();
        $this->applyFilters($query, $request);
        $items = $query->paginate(12);
        
        return view('directory.index', [
            'type' => 'cooperative',
            'title' => 'Cooperatives Directory',
            'items' => $items,
            'stats' => $this->getStats('cooperative')
        ]);
    }

    public function analytics()
    {
        return view('directory.analytics', [
            'stats' => $this->getStats('global'),
            'stateWise' => [
                ['name' => 'Maharashtra', 'fpos' => 1250, 'shgs' => 4500, 'growth' => '15%'],
                ['name' => 'Karnataka', 'fpos' => 980, 'shgs' => 3200, 'growth' => '12%'],
                ['name' => 'Kerala', 'fpos' => 450, 'shgs' => 2800, 'growth' => '18%'],
                ['name' => 'Punjab', 'fpos' => 860, 'shgs' => 1500, 'growth' => '10%'],
                ['name' => 'Uttar Pradesh', 'fpos' => 1100, 'shgs' => 5200, 'growth' => '14%'],
            ]
        ]);
    }

    public function profile($type, $id)
    {
        $model = $this->getModelByType($type);
        $item = $model::findOrFail($id);
        
        return view('directory.profile', [
            'item' => $item,
            'type' => $type
        ]);
    }

    public function districts($state)
    {
        // In a real app, this would query the DB for unique districts in that state
        $data = [
            'Maharashtra' => ['Pune', 'Nashik', 'Mumbai', 'Nagpur'],
            'Karnataka' => ['Bangalore', 'Mysore', 'Hubli', 'Mangalore'],
            'Kerala' => ['Palakkad', 'Kochi', 'Thiruvananthapuram'],
            'Punjab' => ['Amritsar', 'Ludhiana', 'Jalandhar'],
            'Uttar Pradesh' => ['Lucknow', 'Kanpur', 'Varanasi']
        ];

        return response()->json($data[$state] ?? []);
    }

    private function applyFilters($query, $request)
    {
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('group_name', 'like', '%' . $request->search . '%');
        }
        
        if ($request->state) {
            $query->where('state', $request->state);
        }
        
        if ($request->district) {
            $query->where('district', $request->district);
        }

        if ($request->product) {
            $query->where('products', 'all', [$request->product]);
        }

        if ($request->verified) {
            $query->where('verified', true);
        }
    }

    private function getStats($type)
    {
        // Mock stats for now, can be calculated from DB
        return [
            'total' => 12450,
            'women_led' => 5420,
            'top_state' => 'Maharashtra',
            'growth' => '+12%'
        ];
    }

    private function getModelByType($type)
    {
        return match($type) {
            'fpo' => Fpo::class,
            'shg' => Shg::class,
            'pacs' => Pacs::class,
            'cooperative' => Cooperative::class,
            default => Fpo::class
        };
    }
}
