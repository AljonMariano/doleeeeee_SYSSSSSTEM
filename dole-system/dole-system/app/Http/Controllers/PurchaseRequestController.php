<?php

namespace App\Http\Controllers;

use App\Models\PurchaseRequest;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function index()
    {
        $purchaseRequests = PurchaseRequest::latest()->paginate(10);
        return view('purchase-requests.index', compact('purchaseRequests'));
    }

    public function create()
    {
        return view('purchase-requests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pr_id' => 'required|unique:purchase_requests',
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
            'requesting_department' => 'required',
            'estimated_amount' => 'required|numeric',
        ]);

        PurchaseRequest::create($validated);

        return redirect()->route('purchase-requests.index')
            ->with('success', 'Purchase Request created successfully.');
    }

    public function show(PurchaseRequest $purchaseRequest)
    {
        return view('purchase-requests.show', compact('purchaseRequest'));
    }

    public function edit(PurchaseRequest $purchaseRequest)
    {
        return view('purchase-requests.edit', compact('purchaseRequest'));
    }

    public function update(Request $request, PurchaseRequest $purchaseRequest)
    {
        $validated = $request->validate([
            'pr_id' => 'required|unique:purchase_requests,pr_id,' . $purchaseRequest->id,
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
            'requesting_department' => 'required',
            'estimated_amount' => 'required|numeric',
        ]);

        $purchaseRequest->update($validated);

        return redirect()->route('purchase-requests.index')
            ->with('success', 'Purchase Request updated successfully.');
    }

    public function destroy(PurchaseRequest $purchaseRequest)
    {
        $purchaseRequest->delete();

        return redirect()->route('purchase-requests.index')
            ->with('success', 'Purchase Request deleted successfully.');
    }
} 