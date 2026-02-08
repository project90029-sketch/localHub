<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    //
    public function profile(Request $request)
    {
        return response()->json(
            $request->user()->residentProfile
        );
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'preferences' => 'nullable|array',
            'notification_settings' => 'nullable|array'
        ]);

        $profile = $request->user()->residentProfile()
         ->updateOrCreate(
            ['user_id' => $request->user()->id],
            $data
         );

         return response()->json([
            'message' => 'Resident profile updated',
            'profile' => $profile
         ]);
    }
}
