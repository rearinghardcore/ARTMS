<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 light:text-gray-200 leading-tight">
            {{ __('Generate Late Slip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-container">
                <div class="form-content">
                    <form action="{{ route('late-entry.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="reason" class="form-label">Reason for being late</label>
                            <textarea id="reason" name="reason" rows="4" class="form-input"></textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            Generate Slip
                        </button>
                    </form>
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
            background-color: #ffffff;
        }

        .form-content {
            color: #333;
            font-family: Arial, sans-serif;
        }

        /* Form Group */
        .form-group {
            margin-top: 1.5rem;
        }

        /* Form Label */
        .form-label {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Textarea */
        .form-input {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background-color: #f9fafb;
            color: #333;
            resize: vertical;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.4);
        }

        /* Submit Button */
        .submit-btn {
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            background-color: #1d4ed8;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
        }

        .submit-btn:hover {
            background-color: #2563eb;
        }

        .submit-btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.4);
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }

            .submit-btn {
                padding: 0.5rem 1rem;
            }
        }
    </style>
</x-app-layout>
