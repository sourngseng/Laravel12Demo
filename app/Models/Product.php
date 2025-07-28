<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Unit relationship
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
