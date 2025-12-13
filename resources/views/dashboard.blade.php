<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Budget Tracker Dashboard</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f8f8f8;
        }

        h1 {
            color: #333;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>

    <h2>Recent Income Entries</h2>
    @if ($recentIncomes->isEmpty())
        <p>No income entries found yet.</p>
    @else
        <ul>
            @foreach ($recentIncomes as $income)
                <li>
                    **Source:** {{ $income->source }}
                    **Amount:** {{ number_format($income->amount, 10, 2) }}
                    **Date:** {{ $income->date }}
                </li>
            @endforeach
        </ul>
    @endif

    @php
        $currentYear = date('Y');
    @endphp

    <p>Current Year: {{ $currentYear }}</p>
</body>

</html>
