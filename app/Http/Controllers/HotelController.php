<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        return Hotel::all();
    }

    public function create()
    {
        Hotel::create([
            'hotel_id' => fake()->randomNumber(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'room_rent' => fake()->randomFloat(),
        ]);
    }
}
