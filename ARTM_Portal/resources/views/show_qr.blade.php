<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generated QR Code') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h3 class="text-lg font-semibold mb-4">Your QR Code</h3>
                    <div class="mt-6">
                        <img class="align-middle mx-auto" src="{{ $qrcode }}" alt="QR Code">
                    </div>
                    <br>
                    <a href="{{ route('generate-qr-form') }}" class="mt-4 px-4 py-2 bg-blue-800 text-white font-semibold rounded-lg shadow-md hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                        Generate Another QR Code
                    </a>
                    <a href="{{ $url }}" class="mt-4 px-4 py-2 bg-blue-800 text-white font-semibold rounded-lg shadow-md hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                        Go to Link
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
