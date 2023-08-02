<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'product_id', 'qty', 'item_price'];

    // Define a relationship with Order model (many-to-one)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Define a relationship with Product model (many-to-one)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
