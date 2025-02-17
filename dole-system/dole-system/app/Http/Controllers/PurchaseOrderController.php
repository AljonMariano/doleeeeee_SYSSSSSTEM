<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with('purchaseRequest')->latest()->paginate(10);
        return view('purchase-orders.index', compact('purchaseOrders'));
    }

    public function create()
    {
        $purchaseRequests = PurchaseRequest::all();
        return view('purchase-orders.create', compact('purchaseRequests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'po_id' => 'required|unique:purchase_orders',
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
            'supplier' => 'required',
            'purchase_request_id' => 'required|exists:purchase_requests,id',
        ]);

        PurchaseOrder::create($validated);

        return redirect()->route('purchase-orders.index')
            ->with('success', 'Purchase Order created successfully.');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load('purchaseRequest');
        return view('purchase-orders.show', compact('purchaseOrder'));
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        $purchaseRequests = PurchaseRequest::all();
        return view('purchase-orders.edit', compact('purchaseOrder', 'purchaseRequests'));
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $validated = $request->validate([
            'po_id' => 'required|unique:purchase_orders,po_id,' . $purchaseOrder->id,
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
            'supplier' => 'required',
            'purchase_request_id' => 'required|exists:purchase_requests,id',
        ]);

        $purchaseOrder->update($validated);

        return redirect()->route('purchase-orders.index')
            ->with('success', 'Purchase Order updated successfully.');
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();

        return redirect()->route('purchase-orders.index')
            ->with('success', 'Purchase Order deleted successfully.');
    }
} 