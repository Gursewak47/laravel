<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository
{
    public function getHotelById(int $id, array $relations = []): Hotel
    {
        return Hotel::with($relations)->findOrFail($id);
    }

    public function storeHotel(array $request): Hotel
    {
        $Hotel = Hotel::create($request);

        return $Hotel;
    }

    public function deleteHotel(Hotel $Hotel): bool
    {
        return $Hotel->delete();
    }
}
