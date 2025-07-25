<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name','type','number','price','size','picture'];

    public function items(): HasMany{
        return $this->hasMany(OrderItem::class);
    }
}


