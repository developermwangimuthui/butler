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
        'delivery_points',
        'invoice_date',
        'order_payment_status',
        'transporter_rate_per_trip',
        'trip_challenges',
    ];

    protected $casts = [
        'delivery_points' => 'array',
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

    /**
     * Get the location that owns the Shipment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'loading_point');
    }
}
