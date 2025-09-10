<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'tracking_number',
        'status',
        'carrier',
        'shipped_at',
        'delivered_at',
    ];

    // Relations
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
