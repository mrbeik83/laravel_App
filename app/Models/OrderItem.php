<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = ['order_id','product_id','number','price'];
    public function order(): BelongsTo{
        return $this->belongsTo(Order::class);
    }
    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
}
