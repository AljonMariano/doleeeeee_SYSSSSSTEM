@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Record Type Navigation -->
        <div class="mb-6">
            <nav class="flex space-x-4 border-b border-gray-200">
                <a href="{{ route('records.index') }}" 
                    class="{{ request()->routeIs('records.index') ? 'px-3 py-2 text-sm font-medium text-blue-700 border-b-2 border-blue-500' : 'px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700' }}">
                    Documents
                </a>
                <a href="{{ route('orders.index') }}" 
                    class="{{ request()->routeIs('orders.*') ? 'px-3 py-2 text-sm font-medium text-blue-700 border-b-2 border-blue-500' : 'px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700' }}">
                    Orders
                </a>
                <a href="{{ route('vouchers.index') }}" 
                    class="{{ request()->routeIs('vouchers.*') ? 'px-3 py-2 text-sm font-medium text-blue-700 border-b-2 border-blue-500' : 'px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700' }}">
                    Vouchers
                </a>
                <a href="{{ route('purchase-requests.index') }}" 
                    class="{{ request()->routeIs('purchase-requests.*') ? 'px-3 py-2 text-sm font-medium text-blue-700 border-b-2 border-blue-500' : 'px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700' }}">
                    Purchase Requests
                </a>
                <a href="{{ route('purchase-orders.index') }}" 
                    class="{{ request()->routeIs('purchase-orders.*') ? 'px-3 py-2 text-sm font-medium text-blue-700 border-b-2 border-blue-500' : 'px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700' }}">
                    Purchase Orders
                </a>
                <a href="{{ route('route-slips.index') }}" 
                    class="{{ request()->routeIs('route-slips.*') ? 'px-3 py-2 text-sm font-medium text-blue-700 border-b-2 border-blue-500' : 'px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700' }}">
                    Route Slips
                </a>
            </nav>
        </div>

        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Route Slips') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Total Route Slips: {{ \App\Models\RouteSlip::count() }}
                </p>
            </div>
            <a href="{{ route('route-slips.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Add New Route Slip
            </a>
        </div>

        <!-- Advanced Search Form -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('route-slips.index') }}" method="GET" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">RS ID</label>
                            <input type="text" name="rs_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request('rs_id') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" name="subject" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request('subject') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Department</label>
                            <input type="text" name="department" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request('department') }}">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date From</label>
                            <input type="date" name="date_from" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request('date_from') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date To</label>
                            <input type="date" name="date_to" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request('date_to') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="reset" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Reset
                        </button>
                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Route Slips Table -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RS ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Origin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($routeSlips as $rs)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $rs->rs_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $rs->date->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $rs->origin }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ Str::limit($rs->subject, 50) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $rs->department }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $rs->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($rs->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="{{ route('route-slips.show', $rs) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                        <a href="{{ route('route-slips.edit', $rs) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('route-slips.destroy', $rs) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this route slip?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        No route slips found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $routeSlips->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 