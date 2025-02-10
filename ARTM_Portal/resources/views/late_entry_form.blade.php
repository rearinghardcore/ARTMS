<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 light:text-gray-200 leading-tight">
            {{ __('Generate Late Slip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 light:text-gray-100">
                    <form action="{{ route('late-entry.store') }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <label for="reason" class="block text-sm font-medium text-gray-700 light:text-black-300">Reason for being late</label>
                            <textarea id="reason" name="reason" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 light:bg-gray-700 light:border-gray-600 light:text-gray-300"></textarea>
                        </div>
                        <button type="submit" class="mt-4 px-4 py-2 bg-blue-800 text-black font-semibold rounded-lg shadow-md hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                            Generate Slip
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>