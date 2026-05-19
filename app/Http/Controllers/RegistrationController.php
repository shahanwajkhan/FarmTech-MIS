<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Farmer;
use App\Models\Shg;
use App\Models\Fpo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{


    // SHG Registration
    public function shgForm() { return view('auth.register-shg'); }
    
    public function shgStore(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->group_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'shg_manager',
            'status' => 'active',
        ]);

        Shg::create([
            'user_id' => $user->id,
            'group_name' => $request->group_name,
            'registration_number' => $request->registration_number,
            'state' => $request->state,
            'district' => $request->district,
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }

    // FPO Registration
    public function fpoForm() { return view('auth.register-fpo'); }
    
    public function fpoStore(Request $request)
    {
        $request->validate([
            'organization_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->organization_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'fpo_manager',
            'status' => 'active',
        ]);

        Fpo::create([
            'user_id' => $user->id,
            'organization_name' => $request->organization_name,
            'registration_number' => $request->registration_number,
            'state' => $request->state,
            'district' => $request->district,
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }
}
