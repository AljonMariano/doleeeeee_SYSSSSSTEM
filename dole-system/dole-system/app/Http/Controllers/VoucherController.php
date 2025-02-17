<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::latest()->paginate(10);
        return view('vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('vouchers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'voucher_id' => 'required|unique:vouchers',
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
            'payee' => 'required',
        ]);

        Voucher::create($validated);

        return redirect()->route('vouchers.index')
            ->with('success', 'Voucher created successfully.');
    }

    public function show(Voucher $voucher)
    {
        return view('vouchers.show', compact('voucher'));
    }

    public function edit(Voucher $voucher)
    {
        return view('vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $validated = $request->validate([
            'voucher_id' => 'required|unique:vouchers,voucher_id,' . $voucher->id,
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
            'payee' => 'required',
        ]);

        $voucher->update($validated);

        return redirect()->route('vouchers.index')
            ->with('success', 'Voucher updated successfully.');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return redirect()->route('vouchers.index')
            ->with('success', 'Voucher deleted successfully.');
    }
} 