<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'po_id',
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
        'supplier',
        'purchase_request_id',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function purchaseRequest()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }
} 