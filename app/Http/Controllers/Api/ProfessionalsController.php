<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfessionalProfile;
use App\Models\Service;
use App\Models\Appointment;

class ProfessionalsController extends Controller
{
    /*Dashboard*/
    public function getDashboard(Request $request){
        $user= $request->user();

        $profile = $user->professionalProfile;

        return response()->Json([
            'user'=>[
                'id'=> $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'profile' => $profile,
           'stats' => [
                    'services' => Service::where('user_id', $user->id)->count(),
                    'appointments' => Appointment::where('user_id', $user->id)->count(),
                    'pending_appointments' => Appointment::where('user_id', $user->id)
                        ->where('status', 'pending')
                        ->count(),
                ]

        ]);
    } 


        public function getProfile(Request $request){
            $profile = $request->user()->professionalProfile;

            if(!$profile){
                return response()->json([
                    'message' => 'Professional profile not found'
                ], 404);
            }
            return response()->json($profile);
        }


        /*profile update */
        public function updateProfile(Request $request){

        $request->validate([
            'bio' => 'nullable|string',
            'specialization' => 'nullable|string',
            'experience_years' => 'nullable|integer',
            'qualifications' => 'nullable|string',
            'hourly_rate' => 'nullable|numeric',
            'consultation_fee' => 'nullable|numeric',
            'services_offered' => 'nullable|string',
            'availability' => 'nullable|string',
        ]);

        $profile = ProfessionalProfile::updateOrCreate(
            ['user_id' => $request->user()->id],
            $request->only([
                'bio',
                'specialization',
                'experience_years',
                'qualifications',
                'hourly_rate',
                'consultation_fee',
                'services_offered',
                'availability'
            ])
        );
        return response()->json([
            'message' => 'Profile updated successfully',
            'profile' => $profile
        ]);
        }


          
         public function addService(Request $request){
            $request->validate([
                'name'=> 'required|string',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'duration' => 'nullable|integer',
            ]);

            $service = Service::create([
                'professional_id' => $request->user()->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'duration' => $request->duration,
                'is_active' => true,
            ]);

            return response()->json([
                'message' => 'Service added successfully',
                'service'=> $service
            ], 201);
         }


         /*Get appointment*/
         public function getAppointment(Request $request){
            $appointments = Appointment::where('professional_id', $request->user()->id)
            ->orderBy('appointment_time', 'desc')
            ->get();

            return response()->json($appointments);
}

     public function updateAppointment (Request $request, $id){
        $request->validate([
            'status' => 'required|in:pending, accepted, rejected, completed'
        ]);

        $appointment = Appointment::where('professional_id', $request->user()->id)
          ->where('id', $id)
          ->first();

          if(!$appointment){
            return response()->json([
                'message' => 'Appointment not found'
            ], 404);
          }

          $appointment->status = $request->status;
          $appointment->save();


          return response()->json([
            'message' => 'Appointment updated successfully',
            'appointment' => $appointment
          ]);
        }
}
