<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteSlip extends Model
{
    protected $fillable = [
        'slip_id',
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
        'document_type',
        'reference_id',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
        'amount' => 'decimal:2',
    ];
} 