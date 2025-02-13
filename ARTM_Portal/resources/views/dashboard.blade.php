<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 light:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white light:bg-gray-800 overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 light:text-gray-100">
                    @if (Auth::user()->notification && Auth::user()->notification_timestamp && Auth::user()->notification_timestamp->diffInHours(now()) < 1)
                        <div class="bg-green-100 border-green border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Notification:</strong>
                            <span class="block sm:inline">{{ Auth::user()->notification }}</span>
                        </div>
                        <br>
                    @endif
                    {{ __("What would you like to do?") }}

                    <div class="space-y-4 mt-4">
                        <a href="{{ route('late-entry.create') }}" class="px-4 py-2 bg-blue-800 text-black font-semibold rounded-lg shadow-md hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                            Generate Slip
                        </a>
                        <a href="{{ route('generate-qr') }}" class="px-4 py-2 bg-blue-800 text-black font-semibold rounded-lg shadow-md hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                            Generate QR Code
                        </a>
                        @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                            <a href="{{ route('late-slip-requests') }}" class="px-4 py-2 bg-green-800 text-black font-semibold rounded-lg shadow-md hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                Late Slip Requests Queue
                            </a>
                            <form action="{{ route('student.search') }}" method="GET" class="mt-4">
                                <input type="text" name="query" placeholder="Search students..." class="px-4 py-2 border rounded">
                                <button type="submit" class="px-4 py-2 bg-blue-800 text-white rounded">Search</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <div class="container-fluid bg-white light:bg-gray-800 shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 light:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Late Entries</h3>
                    <table class="min-w-full divide-y divide-gray-200 light:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 light:bg-gray-700 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Student ID
                                </th>
                                <th class="px-6 py-3 bg-gray-50 light:bg-gray-700 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 bg-gray-50 light:bg-gray-700 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 bg-gray-50 light:bg-gray-700 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Time
                                </th>
                                <th class="px-6 py-3 bg-gray-50 light:bg-gray-700 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Reason
                                </th>
                                <th class="px-6 py-3 bg-gray-50 light:bg-gray-700 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white light:bg-gray-800 divide-y divide-gray-200 light:divide-gray-700">
                            @foreach ($lateEntries as $entry)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->user->student_id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->date }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->time }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->reason }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
