<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_item extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
}
