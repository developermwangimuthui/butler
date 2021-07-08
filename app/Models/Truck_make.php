<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck_make extends Model
{
    use HasFactory;

    protected $fillable =[
        'make',
        'description'
    ];

    /**
     * Get all of the trucks for the Truck_make
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }
    
}
