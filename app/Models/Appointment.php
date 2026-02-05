<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Service;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'professional_id',
        'service_id',
        'appointment_time',
        'notes',
        'status',
        'total_price'
    ];

    protected $casts = [
        'appointment_time' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function professional()
    {
        return $this->belongsTo(User::class, 'professional_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
