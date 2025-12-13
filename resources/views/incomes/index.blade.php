<h1>Your Income Entries</h1>
<a href="{{ route('income.create') }}">Add new Income</a>

@if ($incomes->isEmpty())
    <p>You haven't recorded any income yet. Start tracking your funds!</p>
@else
    <table>
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
                    <td>{{ $income->source }}</td>
                    <td>{{ number_format($income->amount, 10, 2) }}</td>
                    <td>{{ $income->date }}</td>
                    <td>
                        <a href="{{ route('income.show', $income) }}">View</a>
                        <a href="{{ route('income.edit', $income) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $incomes->links() }}
    </div>
@endif
