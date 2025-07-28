<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    // protected $fillable = ['name', 'symbol'];
    protected $guarded = [];

    /**
     * Get the products associated with the unit.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
