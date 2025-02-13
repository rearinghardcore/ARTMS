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
        /* Global Styles */
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            transition: background-color 0.3s ease;
        }

        /* Dark Mode Background */
        body.dark {
            background-color: #1a202c;
        }

        .validation-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 90%;
            max-width: 500px;
            transition: background-color 0.3s ease;
        }

        .validation-container.dark {
            background-color: #2d3748;
        }

        /* Header */
        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1.5rem;
            transition: color 0.3s ease;
        }

        .dark h1 {
            color: #edf2f7;
        }

        /* Validation Message */
        .validation-message {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .text-green-500 {
            color: #38a169;
        }

        .text-red-500 {
            color: #e53e3e;
        }

        /* Text for late validation */
        .validation-message {
            padding: 1rem;
            background-color: #f0fdf4;
            border-radius: 8px;
            color: #22543d;
            border: 1px solid #c6f6d5;
            transition: background-color 0.3s ease;
        }

        .dark .validation-message {
            background-color: #4a5568;
            color: #edf2f7;
            border-color: #2d3748;
        }

        .validation-container p {
            color: #2d3748;
            margin-top: 1rem;
        }

        /* For invalid late slip */
        .validation-message-invalid {
            background-color: #fff5f5;
            color: #9b2c2c;
            border: 1px solid #fed7d7;
        }

        .dark .validation-message-invalid {
            background-color: #2d3748;
            color: #fbd5d5;
            border: 1px solid #cbd5e0;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .validation-container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.75rem;
            }

            .validation-message {
                font-size: 1.125rem;
            }
        }
    </style>
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex items-center justify-center">
        <div class="validation-container bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Late Entry Validation</h1>
            @if ($lateEntry->isApproved == 1)
                <p class="validation-message text-xl font-semibold text-blue-500">This late slip request is to acknowledge that {{ $lateEntry->user->name }} was late due to: {{ $lateEntry->reason }}
                </p>
                <p class="validation-message text-xl font-semibold text-green-500">This late slip of {{ $lateEntry->user->name }} is valid.
                    <br>Date of Late Slip: {{ $lateEntry->date }}
                </p>
                
            @else
            
                <p class="validation-message text-xl font-semibold text-red-500">
                    This late slip of {{ $lateEntry->user->name }} is not valid.
                </p>
            @endif
        </div>
    </div>
</body>
</html>
