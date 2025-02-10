<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Late Slip Requests') }}
        </h2>
    </x-slot>

    <style>
        #red {
            background-color: red;
        }
        #green {
            background-color: green;
        }
        #green:hover {
            background-color: darkgreen;
        }
        #red:hover {
            background-color: darkred;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white light:bg-gray-800 overflow-x-auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 light:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200 light:divide-gray-700">
                        <thead class="bg-gray-50 light:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    User ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Reason
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 light:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white light:bg-gray-800 divide-y divide-gray-200 light:divide-gray-700">
                            @foreach ($lateEntries as $entry)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->user->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 light:text-gray-100">
                                        {{ $entry->reason }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 light:text-gray-100">
                                        <form action="{{ route('late-slip-requests.approve', $entry->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" id="green" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Approve</button>
                                        </form>
                                        <form action="{{ route('late-slip-requests.reject', $entry->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" id="red" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reject</button>
                                        </form>
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
