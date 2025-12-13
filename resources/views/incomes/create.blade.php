@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Add Income</h1>

        <form action="{{ route('incomes.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Source -->
            <div>
                <label for="source" class="block text-sm font-medium text-gray-700">Source</label>
                <input type="text" name="source" id="source"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                          focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ old('source') }}" required>
            </div>

            <!-- Amount -->
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="number" name="amount" id="amount" step="0.01"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                          focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ old('amount') }}" required>
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                <textarea name="notes" id="notes" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                             focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('notes') }}</textarea>
            </div>

            <!-- Date -->
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                          focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ old('date') }}" required>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-indigo font-semibold rounded-md
                           hover:bg-indigo-700 focus:outline-none focus:ring-2
                           focus:ring-offset-2 focus:ring-indigo-500">
                    Save Income
                </button>
            </div>
        </form>
    </div>
@endsection
