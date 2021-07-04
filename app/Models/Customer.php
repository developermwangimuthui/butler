<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'town',
        'location_description',
    ];

    /**
     * Get the user that owns the customer account.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the shipments belonging to the customer.
     */
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
}
