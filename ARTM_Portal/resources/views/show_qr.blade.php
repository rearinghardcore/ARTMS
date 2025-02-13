<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generated QR Code') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-container">
                <div class="form-content text-center">
                    <h3 class="form-title">Your QR Code</h3>
                    <div class="qr-code-container mt-6">
                        <img class="qr-code-img" src="{{ $qrcode }}" alt="QR Code">
                    </div>
                    <div class="button-container">
                        <a href="{{ route('generate-qr') }}" class="btn-generate mt-4">
                            Generate Another QR Code
                        </a>
                        <a href="{{ $url }}" class="btn-link mt-4">
                            Go to Link
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Main Container */
        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: 0 auto;
        }

        .form-content {
            color: #333;
            font-family: Arial, sans-serif;
        }

        /* Title */
        .form-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
        }

        /* QR Code Container */
        .qr-code-container {
            max-width: 200px;
            margin: 0 auto;
        }

        .qr-code-img {
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        /* Button Container */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-direction: column;
        }

        /* Button Styles */
        .btn-generate, .btn-link {
            padding: 0.75rem 1.5rem;
            background-color: #1d4ed8;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
            display: inline-block;
            text-align: center;
        }

        .btn-generate:hover, .btn-link:hover {
            background-color: #2563eb;
        }

        .btn-generate:focus, .btn-link:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.4);
        }

        .btn-generate:active, .btn-link:active {
            transform: scale(0.98);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }

            .qr-code-container {
                max-width: 150px;
            }

            .btn-generate, .btn-link {
                padding: 0.5rem 1rem;
            }
        }
    </style>
</x-app-layout>
