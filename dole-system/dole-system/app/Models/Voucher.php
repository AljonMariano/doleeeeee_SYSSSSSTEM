<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'voucher_id',
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
        'payee',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
        'amount' => 'decimal:2',
    ];
} 