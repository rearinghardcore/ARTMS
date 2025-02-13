<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate QR Code') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 light:text-gray-100">
                    <form action="{{ route('generate-qr') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="entry_slip" class="block text-sm font-medium text-gray-700 light:text-gray-300">Select Entry Slip to Generate</label>
                            <br>
                            <select id="entry_slip" name="entry_slip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-black light:focus:ring-blue-500 light:focus:border-blue-500">
                                @foreach ($lateEntries as $entry)
                                    <option value="{{ $entry->id }}">
                                        {{ $entry->user->name }} - {{ $entry->date }} - {{ $entry->time }} - {{ $entry->status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-800 text-black font-semibold rounded-lg shadow-md hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                            Generate QR Code
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>