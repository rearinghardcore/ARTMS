<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrator Dashboard') }}

        </h2>
    </x-slot>
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white white:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 white:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Students</h3>
                    <table class="min-w-full divide-y divide-gray-200 white:divide-gray-700">
                        <thead class="bg-gray-50 white:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 white:text-gray-300 uppercase tracking-wider">
                                    Student ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 white:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 white:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 white:text-gray-300 uppercase tracking-wider">
                                    Number of Late Entries
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 white:text-gray-300 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white white:bg-gray-800 divide-y divide-gray-200 white:divide-gray-700">
                            @foreach ($students as $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 white:text-gray-100">
                                        {{ $student->student_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 white:text-gray-100">
                                        {{ $student->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 white:text-gray-100">
                                        {{ $student->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 white:text-gray-100 align-middle">
                                        {{ $student->late_entries_count }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 white:text-gray-100">
                                    <a href="{{ route('admin.student.late-entries', $student->id) }}" class="text-blue-600 hover:text-blue-900">View Late Entries</a>
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
