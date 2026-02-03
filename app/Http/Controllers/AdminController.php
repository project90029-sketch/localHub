<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        // ✅ Correct validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Fetch admin from DB
        $admin = Admin::where('email', $request->email)->first();

        // Plain-text password check (temporary)
        if (!$admin || $request->password !== $admin->password) {
            return back()->with('error', 'Invalid credentials');
        }

        // Store session
        session([
            'admin_id'   => $admin->id,
            'admin_name' => $admin->name,
        ]);

        // Redirect to dashboard
        return redirect('dashboard')
               ->with('success', 'Login successful');
    }
}
