<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'room_rent',
    ];

    protected $casts = [
        'id' => 'integer',
        'hotel_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'room_rent' => 'float',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
