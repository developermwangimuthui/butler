<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck_type extends Model
{
    use HasFactory;

    protected $fillable =[
        'type',
        'description'
    ];

     /**
     * Get all of the trucks for the Truck_type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trucks()
    {
        return $this->hasMany(Truck::class, 'type_id');
    }
}
