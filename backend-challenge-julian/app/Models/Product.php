<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'Id';
    protected $fillable = ['name', 'description', 'price', 'qty'];
}
