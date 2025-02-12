@extends('layouts.app')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add New Document') }}
                </h2>
                <a href="{{ route('records.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('records.store') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Document ID -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Document ID</label>
                                <input type="text" readonly value="{{ $newDocId }}" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <!-- Origin -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Origin/Source</label>
                                <input type="text" name="origin" value="{{ old('origin') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('origin')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('subject')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Forward To -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Forward To</label>
                            <select name="forward_to" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Select Department</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->code }}" {{ old('forward_to') == $dept->code ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('forward_to')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remarks -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Remarks</label>
                            <textarea name="remarks" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('remarks') }}</textarea>
                            @error('remarks')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('records.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Create Document
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 