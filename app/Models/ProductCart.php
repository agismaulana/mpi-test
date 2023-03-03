<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    use HasFactory;

    public $table = 'product_cart';
    public $fillable = [
        'product_id',
        'quantity',
        'price',
        'total_price',
        'user_id',
    ];

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
