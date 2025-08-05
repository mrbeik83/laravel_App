<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name','product_code','type','number','price','size','picture','description','colors','status'];

    protected $casts = [
        'colors' => 'array'
    ];
    public function items(): HasMany{
        return $this->hasMany(OrderItem::class);
    }
}


