<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'date',
        'sales_channel',
        'order_id',
        'customer_id',
        'gstin',
        'ship_date',
        'deliver_date',
        'billing_address',
        'shipping_address',
    ];
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'sales_channel' => 'string',
        'order_id' => 'string',
        'customer_id' => 'string',
        'gstin' => 'string',
        'ship_date' => 'date',
        'deliver_date' => 'date',
        'billing_address' => 'jsonb',
        'shipping_address' => 'jsonb',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
