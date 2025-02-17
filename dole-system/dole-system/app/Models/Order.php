<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'date',
        'time',
        'origin',
        'subject',
        'amount',
        'forward_to',
        'status',
        'remarks',
        'received_by',
        'file_case_no',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
        'amount' => 'decimal:2',
    ];
} 