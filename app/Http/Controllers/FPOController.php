<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fpo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FPOController extends Controller
{
    /**
     * Show the FPO/FPG registration form.
     */
    public function create()
    {
        return view('auth.fpo-register');
    }

    /**
     * Store a newly created FPO and its corresponding user account.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organization_name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:100',
            'organization_type' => 'required|string|in:FPO,FPG,Cooperative',
            'establishment_year' => 'required|integer|min:1900|max:' . date('Y'),
            'members_count' => 'required|integer|min:1',
            'contact_person' => 'required|string|max:255',
            'mobile' => 'required|string|unique:users,mobile',
            'email' => 'required|string|email|max:255|unique:users,email',
            'state' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'village' => 'required|string|max:100',
            'address' => 'required|string',
            'pincode' => 'required|string|size:6',
            'products' => 'nullable|array',
            'business_activity' => 'required|string|in:Farming,Processing,Dairy,Organic Farming,Packaging',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'ifsc_code' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'logo' => 'nullable|image|max:5120',
            'registration_certificate' => 'nullable|file|max:5120',
            'product_images' => 'nullable|array',
            'product_images.*' => 'image|max:5120',
        ]);

        // 1. Create corresponding User Account
        $user = User::create([
            'name' => $request->organization_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'role' => 'fpo_manager',
            'status' => 'active',
        ]);

        // 2. Prepare FPO specific profile data
        $fpoData = [
            'user_id' => $user->id,
            'organization_name' => $request->organization_name,
            'registration_number' => $request->registration_number,
            'organization_type' => $request->organization_type,
            'establishment_year' => (int) $request->establishment_year,
            'members_count' => (int) $request->members_count,
            'contact_person' => $request->contact_person,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'state' => $request->state,
            'district' => $request->district,
            'village' => $request->village,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'products' => $request->products ?? [],
            'business_activity' => $request->business_activity,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'ifsc_code' => $request->ifsc_code,
            'women_led' => $request->has('women_led'),
            'government_registered' => $request->has('government_registered'),
            'organic_certified' => $request->has('organic_certified'),
            'documents' => [],
        ];

        // 3. Handle File Uploads
        // Logo Upload
        if ($request->hasFile('logo')) {
            $fpoData['logo'] = $request->file('logo')->store('fpos/logos', 'public');
        }

        // Registration Certificate
        $documents = [];
        if ($request->hasFile('registration_certificate')) {
            $documents['registration_certificate'] = $request->file('registration_certificate')->store('fpos/documents', 'public');
        }

        // Product Images
        if ($request->hasFile('product_images')) {
            $productPaths = [];
            foreach ($request->file('product_images') as $image) {
                $productPaths[] = $image->store('fpos/products', 'public');
            }
            $documents['product_images'] = $productPaths;
        }
        $fpoData['documents'] = $documents;

        // 4. Create FPO in MongoDB
        Fpo::create($fpoData);

        // 5. Authenticate user and redirect
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'FPO Registration successful! Welcome to the FarmTech MIS network.');
    }
}
