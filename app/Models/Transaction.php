<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;

    public $table = 'transactions';
    public $fillable = [
        'code_transaction',
        'total_price',
        'status',
    ];


    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function save(array $options = []) {
        if(empty($this->code_transaction))
            $this->code_transaction = Str::random(5);

        return parent::save($options);
    }
}
