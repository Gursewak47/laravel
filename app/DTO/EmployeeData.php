<?php

namespace App\DTO;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EmployeeData extends Data
{
    public string $first_name;
    public string $last_name;
    public string $email;
    public float $salary;
    public string $phone;
    public string $address;
}
