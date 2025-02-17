<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = [
        'pr_id',
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
        'requesting_department',
        'estimated_amount',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
        'amount' => 'decimal:2',
        'estimated_amount' => 'decimal:2',
    ];
} 