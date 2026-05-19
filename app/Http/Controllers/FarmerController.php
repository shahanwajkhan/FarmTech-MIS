<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Farmer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller
{
    public function create()
    {
        return view('auth.farmer-register');
    }

    public function store(Request $request)
    {
        // Simple Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:users|digits:10',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'state' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string',
            'land_area' => 'required|numeric',
            'crop_type' => 'required|string',
            'shg_fpo_member' => 'required|in:Yes,No',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Create User Record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'role' => 'farmer',
            'status' => 'active',
        ]);

        // Prepare Farmer Data
        $farmerData = [
            'user_id' => $user->id,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'state' => $request->state,
            'district' => $request->district,
            'village' => $request->village,
            'land_area' => $request->land_area,
            'crop_type' => $request->crop_type,
            'shg_fpo_member' => $request->shg_fpo_member,
        ];

        // Handle File Upload
        if ($request->hasFile('profile_photo')) {
            $farmerData['profile_photo'] = $request->file('profile_photo')->store('farmers/profiles', 'public');
        }

        // Create Farmer Record
        Farmer::create($farmerData);

        // Authenticate and Redirect
        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Farmer Registration successful!');
    }
}
