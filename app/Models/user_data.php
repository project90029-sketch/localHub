<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_data extends Model
{
    // Explicit table name (mandatory)
    protected $table = 'user_register';

    // Primary key (change if your column is different)
    protected $primaryKey = 'id';

    // Disable timestamps if your table doesn't have them
    public $timestamps = false;

    // Mass-assignable fields
    protected $fillable = [
        'email',
        'pass'
    ];
}
