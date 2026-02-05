<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_data;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // 2. Fetch admin by email
        $admin = user_data::where('email', $request->email)->first();

        // 3. Check credentials (PLAIN TEXT – TEMPORARY)
        if (!$admin || $request->password !== $admin->password) {
            return back()->with('error', 'Invalid credentials');
        }

        // 4. Store admin session
        session([
            'admin_id'    => $admin->id,
            'admin_email' => $admin->email
        ]);

        // 5. Redirect to dashboard
        return redirect('/dashboard');
    }
}
