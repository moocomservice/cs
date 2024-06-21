<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname', 'idcard', 'bankType', 'bankAccount', 'date', 'amount', 'productName', 'telephone', 'image_urls'
    ];

    protected $attributes = [
        'status' => 'pending',
    ];
}
