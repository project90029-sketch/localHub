<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    public function run()
    {
        $professional = User::where('user_type', 'professional')->first();
        $resident = User::where('user_type', 'resident')->first();
        $business = User::where('user_type', 'business')->first();

        if ($professional && $resident) {
            Message::create([
                'sender_id' => $resident->id,
                'receiver_id' => $professional->id,
                'message' => "Hi, are you available for a house visit today?",
                'is_read' => false
            ]);

            Message::create([
                'sender_id' => $professional->id,
                'receiver_id' => $resident->id,
                'message' => "Yes, I can come by 5 PM. Does that work?",
                'is_read' => true
            ]);
        }

        if ($professional && $business) {
            Message::create([
                'sender_id' => $business->id,
                'receiver_id' => $professional->id,
                'message' => "We have a large contract for the office building maintenance. Interested?",
                'is_read' => false
            ]);
        }
    }
}
