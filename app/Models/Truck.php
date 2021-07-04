<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Truck extends Model
{
    use HasFactory;
    /**
     * Get the truck shipments.
     */
    protected $fillable =[
        'owners_name',
        'owners_phone',
        'registration',
        'model',
        'load_capacity',
        'truck_type',
        'cargo_bed_dimensions',
    ];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
}
