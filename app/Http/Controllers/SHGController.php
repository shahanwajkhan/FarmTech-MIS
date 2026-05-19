<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shg;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SHGController extends Controller
{
    /**
     * Show the SHG registration form.
     */
    public function create()
    {
        return view('auth.shg-register');
    }

    /**
     * Store a newly created SHG and its corresponding user account.
     */
    public function store(Request $request)
    {
        $request->validate([
            'shg_name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:100',
            'formation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'members_count' => 'required|integer|min:1',
            'shg_category' => 'required|string|in:Women SHG,Agriculture SHG,Dairy SHG,Handicraft SHG',
            'leader_name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:users,mobile',
            'email' => 'required|string|email|max:255|unique:users,email',
            'state' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'village' => 'required|string|max:100',
            'address' => 'required|string',
            'pincode' => 'required|string|size:6',
            'main_activity' => 'required|string|in:Agriculture,Dairy,Food Processing,Handicrafts,Organic Farming',
            'products' => 'nullable|array',
            'bank_linkage' => 'required|string|in:Linked,Not Linked',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'ifsc_code' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'group_photo' => 'nullable|image|max:5120',
            'registration_certificate' => 'nullable|file|max:5120',
            'product_images' => 'nullable|array',
            'product_images.*' => 'image|max:5120',
        ]);

        // 1. Create corresponding User Account
        $user = User::create([
            'name' => $request->shg_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'role' => 'shg_manager',
            'status' => 'active',
        ]);

        // 2. Prepare SHG specific profile data
        $shgData = [
            'user_id' => $user->id,
            'shg_name' => $request->shg_name,
            'registration_number' => $request->registration_number,
            'formation_year' => (int) $request->formation_year,
            'members_count' => (int) $request->members_count,
            'shg_category' => $request->shg_category,
            'leader_name' => $request->leader_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'state' => $request->state,
            'district' => $request->district,
            'village' => $request->village,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'main_activity' => $request->main_activity,
            'products' => $request->products ?? [],
            'bank_linkage' => $request->bank_linkage,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'ifsc_code' => $request->ifsc_code,
            'women_led' => $request->has('women_led'),
            'government_registered' => $request->has('government_registered'),
            'training_completed' => $request->has('training_completed'),
            'documents' => [],
        ];

        // 3. Handle File Uploads
        // Group Photo
        if ($request->hasFile('group_photo')) {
            $shgData['group_photo'] = $request->file('group_photo')->store('shgs/photos', 'public');
        }

        // Registration Certificate
        $documents = [];
        if ($request->hasFile('registration_certificate')) {
            $documents['registration_certificate'] = $request->file('registration_certificate')->store('shgs/documents', 'public');
        }

        // Product Images
        if ($request->hasFile('product_images')) {
            $productPaths = [];
            foreach ($request->file('product_images') as $image) {
                $productPaths[] = $image->store('shgs/products', 'public');
            }
            $documents['product_images'] = $productPaths;
        }
        $shgData['documents'] = $documents;

        // 4. Create SHG in MongoDB
        Shg::create($shgData);

        // 5. Authenticate user and redirect
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'SHG Registration successful! Welcome to the FarmTech MIS network.');
    }
}
