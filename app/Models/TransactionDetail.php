<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    public $table = 'transaction_details';
    public $fillable = [
        'transaction_id',
        'product_id',
        'price',
        'quantity',
        'total_price',
    ];

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
