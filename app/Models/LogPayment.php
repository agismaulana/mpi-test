<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class LogPayment extends Model
{
    use HasFactory;

    public $table = 'log_payments';
    public $fillable = [
        'url',
        'headers',
        'body',
        'response'
    ];
}
