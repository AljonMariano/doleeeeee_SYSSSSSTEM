<?php

namespace App\Http\Controllers;

use App\Models\RouteSlip;
use Illuminate\Http\Request;

class RouteSlipController extends Controller
{
    public function index()
    {
        $routeSlips = RouteSlip::latest()->paginate(10);
        return view('route-slips.index', compact('routeSlips'));
    }

    public function create()
    {
        return view('route-slips.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slip_id' => 'required|unique:route_slips',
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
            'document_type' => 'required|in:PO,PR,Voucher',
            'reference_id' => 'required',
        ]);

        RouteSlip::create($validated);

        return redirect()->route('route-slips.index')
            ->with('success', 'Route Slip created successfully.');
    }

    public function show(RouteSlip $routeSlip)
    {
        return view('route-slips.show', compact('routeSlip'));
    }

    public function edit(RouteSlip $routeSlip)
    {
        return view('route-slips.edit', compact('routeSlip'));
    }

    public function update(Request $request, RouteSlip $routeSlip)
    {
        $validated = $request->validate([
            'slip_id' => 'required|unique:route_slips,slip_id,' . $routeSlip->id,
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
            'document_type' => 'required|in:PO,PR,Voucher',
            'reference_id' => 'required',
        ]);

        $routeSlip->update($validated);

        return redirect()->route('route-slips.index')
            ->with('success', 'Route Slip updated successfully.');
    }

    public function destroy(RouteSlip $routeSlip)
    {
        $routeSlip->delete();

        return redirect()->route('route-slips.index')
            ->with('success', 'Route Slip deleted successfully.');
    }
} 