<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|unique:orders',
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'order_id' => 'required|unique:orders,order_id,' . $order->id,
            'date' => 'required|date',
            'time' => 'required',
            'origin' => 'required',
            'subject' => 'required',
            'amount' => 'required|numeric',
            'forward_to' => 'required',
            'received_by' => 'required',
            'file_case_no' => 'required',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
} 