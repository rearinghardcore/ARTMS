<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 light:text-gray-200 leading-tight">
            {{ __('Late Entries for ') . $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 light:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Tardiness Log</h3>
                    <table style="width: 100%; border-collapse: collapse; border-radius: 8px; overflow: hidden;">
                        <thead style="background-color: #2b6cb0; color: white; text-align: left; font-weight: bold; text-transform: uppercase;">
                            <tr>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Student ID</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Email</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Date</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Time</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Reason</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Status</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #f8fafc; color: #333; text-align: left;">
                            @foreach ($lateEntries as $entry)
                                <tr style="border-bottom: 1px solid #ddd;">
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $entry->user->student_id }}</td>
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $entry->user->email }}</td>
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $entry->date }}</td>
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $entry->time }}</td>
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $entry->reason }}</td>
                                    <td style="padding: 12px 16px; text-align: center;">
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
