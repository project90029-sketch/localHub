<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_id',
        'name',
        'description',
        'price',
        'duration',
        'category',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function professional()
    {
        return $this->belongsTo(User::class, 'professional_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
