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
    {{-- This is a Blade comment. The browser won't see it. --}}
    <h1>{{ $title }}</h1> {{-- Blade syntax for echoing PHP variables --}}

    <p>This is the start of your powerful new Budget Tracker application!</p>

    {{-- Simple Blade directive for showing dynamic content --}}
    @php
        $currentYear = date('Y');
    @endphp

    <p>Current Year: {{ $currentYear }}</p>
</body>

</html>
