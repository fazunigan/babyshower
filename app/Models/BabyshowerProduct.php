<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyshowerProduct extends Model
{
    use HasFactory;

    protected $table = 'babyshower_product';

    protected $guarded = [];

    public function products(){
        return $this->belongsTo('App\Models\Product');
    }
}
