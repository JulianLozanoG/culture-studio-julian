<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'total', 'created_at'];

    // Define a relationship with User model (one-to-many)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define a relationship with OrderItem model (one-to-many)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
