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
        'make_id',
        'type_id',
        'load_capacity',
        'truck_type',
        'cargo_bed_dimensions',
    ];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    /**
     * Get the truck_make that owns the Truck
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function truck_make()
    {
        return $this->belongsTo(Truck_make::class, 'make_id');
    }

    /**
     * Get the truck_make that owns the Truck
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function truck_type()
    {
        return $this->belongsTo(Truck_type::class, 'type_id');
    }
}
