<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use HasFactory;

     /**
     * Get the user that owns the customer account.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
