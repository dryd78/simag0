<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function products()
    {
        return $this->belongsToMany(product::class);
    }

}
