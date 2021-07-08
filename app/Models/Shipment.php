<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'truck_id',
        'loading_point',
        'cargo_description',
        'shipment_dispatch_date',
        'shipment_dispatch_time',
        'shipment_arrival_date',
        'shipment_arrival_time',
        'delivery_point_1',
        'delivery_point_2',
        'delivery_point_3',
        'delivery_point_4',
        'delivery_point_5',
        'order_delivery_status',
        'delivery_note_number',
        'delivery_note_image',
        'invoice_date',
        'order_payment_status',
        'transporter_rate_per_trip',
        'trip_challenges',
    ];

    protected $casts = [
        'delivery_point' => 'array',
    ];

    /**
     * Get the Customer that owns the Shipment.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the Truck that owns the Shipment.
     */
    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }
}
