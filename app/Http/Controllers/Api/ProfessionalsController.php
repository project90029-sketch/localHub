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
    public function getDashboard(Request $request)
    {
        $user = $request->user();
        $profile = $user->professionalProfile;

        // Get services count
        $servicesCount = Service::where('professional_id', $user->id)->count();
        $activeServicesCount = Service::where('professional_id', $user->id)
            ->where('is_active', true)
            ->count();

        // Get appointments statistics
        $totalAppointments = Appointment::where('professional_id', $user->id)->count();
        $upcomingAppointments = Appointment::where('professional_id', $user->id)
            ->where('appointment_time', '>', now())
            ->where('status', '!=', 'cancelled')
            ->count();
        $pendingAppointments = Appointment::where('professional_id', $user->id)
            ->where('status', 'pending')
            ->count();

        // Calculate total earnings (completed appointments)
        $totalEarnings = Appointment::where('professional_id', $user->id)
            ->where('status', 'completed')
            ->sum('total_price');

        // Get most popular service
        $popularService = Service::where('professional_id', $user->id)
            ->withCount('appointments')
            ->orderBy('appointments_count', 'desc')
            ->first();

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'profile' => $profile,
            'stats' => [
                'total_services' => $servicesCount,
                'active_services' => $activeServicesCount,
                'total_appointments' => $totalAppointments,
                'upcoming_appointments' => $upcomingAppointments,
                'pending_appointments' => $pendingAppointments,
                'total_earnings' => $totalEarnings,
                'popular_service' => $popularService ? $popularService->name : null,
            ]
        ]);
    }


    public function getProfile(Request $request)
    {
        $profile = $request->user()->professionalProfile;

        if (!$profile) {
            return response()->json([
                'message' => 'Professional profile not found'
            ], 404);
        }
        return response()->json($profile);
    }


    /*profile update */
    public function updateProfile(Request $request)
    {

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



    public function addService(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
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
            'service' => $service
        ], 201);
    }


    /*Get appointment*/
    public function getAppointment(Request $request)
    {
        $appointments = Appointment::where('professional_id', $request->user()->id)
            ->with(['user', 'service'])
            ->orderBy('appointment_time', 'desc')
            ->get();

        return response()->json($appointments);
    }

    public function updateAppointment(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending, accepted, rejected, completed'
        ]);

        $appointment = Appointment::where('professional_id', $request->user()->id)
            ->where('id', $id)
            ->first();

        if (!$appointment) {
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

    /*List Services*/
    public function listService(Request $request)
    {
        $services = Service::where('professional_id', $request->user()->id)
            ->withCount('appointments')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($services);
    }

    /*Get Earnings*/
    public function getEarnings(Request $request)
    {
        $user = $request->user();

        // Total earnings from completed appointments
        $totalEarnings = Appointment::where('professional_id', $user->id)
            ->where('status', 'completed')
            ->sum('total_price');

        // This month's earnings
        $thisMonthEarnings = Appointment::where('professional_id', $user->id)
            ->where('status', 'completed')
            ->whereMonth('appointment_time', now()->month)
            ->whereYear('appointment_time', now()->year)
            ->sum('total_price');

        // Last month's earnings
        $lastMonthEarnings = Appointment::where('professional_id', $user->id)
            ->where('status', 'completed')
            ->whereMonth('appointment_time', now()->subMonth()->month)
            ->whereYear('appointment_time', now()->subMonth()->year)
            ->sum('total_price');

        // Calculate percentage change
        $percentageChange = 0;
        if ($lastMonthEarnings > 0) {
            $percentageChange = (($thisMonthEarnings - $lastMonthEarnings) / $lastMonthEarnings) * 100;
        }

        // Recent earnings (last 10 completed appointments)
        $recentEarnings = Appointment::where('professional_id', $user->id)
            ->where('status', 'completed')
            ->with(['user', 'service'])
            ->orderBy('appointment_time', 'desc')
            ->limit(10)
            ->get();

        return response()->json([
            'total_earnings' => $totalEarnings,
            'this_month' => $thisMonthEarnings,
            'last_month' => $lastMonthEarnings,
            'percentage_change' => round($percentageChange, 2),
            'recent_earnings' => $recentEarnings
        ]);
    }

    /*Get Reviews*/
    public function getReviews(Request $request)
    {
        // For now, return mock data since we don't have a reviews table yet
        // You can create a reviews table and model later
        return response()->json([
            'average_rating' => 4.5,
            'total_reviews' => 0,
            'reviews' => []
        ]);
    }
}
