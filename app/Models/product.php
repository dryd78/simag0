<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function product_categories()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
