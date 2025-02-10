<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Late Entry Validation</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f3f4f6; /* Light gray background */
        }
        .validation-container {
            background-color:rgb(202, 202, 202); /* White background */
            border: 1px solidrgb(235, 235, 235); /* Light gray border */
            padding: 2rem; /* Padding */
            border-radius: 0.5rem; /* Rounded corners */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* Shadow */
        }
        .validation-container.light {
            background-color: #1f2937; /* light background */
            border-color: #374151; /* light border */
        }
        .validation-message {
            font-size: 1.25rem; /* Larger font size */
            font-weight: 600; /* Bold text */
        }
        .validation-message.valid {
            color: #10b981; /* Green text */
        }
        .validation-message.invalid {
            color: #ef4444; /* Red text */
        }
    </style>
</head>
<body class="antialiased bg-gray-100 light:bg-gray-900">
    <div class="min-h-screen flex items-center justify-center">
        <div class="validation-container bg-white light:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
            <h1 class="text-2xl font-bold text-gray-900 light:text-gray-100 mb-4">Late Entry Validation</h1>
            @if ($lateEntry->isApproved == 1)
                <p class="validation-message valid">This late slip request is to acknowledge that {{ $lateEntry->user->name }} was late due to {{ $lateEntry->reason }}.
                <br>This late slip of {{ $lateEntry->user->name }} is valid.
                </p>
            @else
                <p class="validation-message invalid"> This late slip request is to acknowledge that {{ $lateEntry->user->name }} was late due to {{ $lateEntry->reason }}. 
                    <br>This late slip of {{ $lateEntry->user->name }} is not valid.</p>
            @endif
        </div>
    </div>
</body>
</html>
