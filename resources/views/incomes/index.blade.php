@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Your Income Entries</h1>

        <a href="{{ route('incomes.create') }}" class="btn btn-primary mb-3">Add New Income</a>

        @if ($incomes->isEmpty())
            <p class="text-muted">You haven't recorded any income yet. Start tracking your funds!</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Source</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incomes as $income)
                        <tr>
                            <td>{{ $income->source }}</td>  //safe
                            <td>{{ !!$income->source!! }}</td>  //trust output safe
                            <td>{{ number_format($income->amount, 2) }}</td>
                            <td>{{ $income->date->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('incomes.show', $income) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('incomes.edit', $income) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('incomes.destroy', $income) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this income?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $incomes->links() }}
            </div>
        @endif
    </div>

@endsection
