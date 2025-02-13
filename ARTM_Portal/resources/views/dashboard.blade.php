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
                        <div style="background-color: #48bb78; border: 2px solid #2f855a; color: white; padding: 16px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" role="alert">
                            <strong style="font-weight: 600; color: black;">Notification:</strong>
                            <span style="display: block; color: black;">{{ Auth::user()->notification }}</span>
                        </div>
                        <br>
                    @endif

                    {{ __("What would you like to do?") }}

                    <div class="space-y-4 mt-4">
                        <a href="{{ route('late-entry.create') }}" style="padding: 12px 24px; background-color: #2b6cb0; color: white; font-weight: 600; border-radius: 8px; text-align: center; text-decoration: none; display: inline-block; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#63b3ed'" onmouseout="this.style.backgroundColor='#2b6cb0'">
                            Generate Slip
                        </a>

                        <a href="{{ route('generate-qr') }}" style="padding: 12px 24px; background-color: #2b6cb0; color: white; font-weight: 600; border-radius: 8px; text-align: center; text-decoration: none; display: inline-block; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#63b3ed'" onmouseout="this.style.backgroundColor='#2b6cb0'">
                            Generate QR Code
                        </a>

                        @if (Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin')
                            <a href="{{ route('late-slip-requests') }}" style="padding: 12px 24px; background-color: #2b6cb0; color: white; font-weight: 600; border-radius: 8px; text-align: center; text-decoration: none; display: inline-block; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#63b3ed'" onmouseout="this.style.backgroundColor='#2b6cb0'">
                                Late Slip Requests Queue
                            </a>
                            <form action="{{ route('student.search') }}" method="GET" class="mt-4">
                                <input type="text" name="query" placeholder="Search students..." style="padding: 12px 16px; border: 1px solid #ddd; border-radius: 8px; width: 200px;">
                                <button type="submit" style="padding: 12px 24px; background-color: #2b6cb0; color: white; font-weight: 600; border-radius: 8px; text-align: center; text-decoration: none; border: none; cursor: pointer; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#63b3ed'" onmouseout="this.style.backgroundColor='#2b6cb0'">
                                    Search
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <div class="container-fluid bg-white light:bg-gray-800 shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 light:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Late Entries</h3>
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
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd;">{{ $entry->reason }}</td>
                                    <td style="padding: 12px 16px; text-align: center;">
                                        <span style="display: inline-block; padding: 6px 12px; border-radius: 4px; font-weight: 600; background-color: 
                                            {{ $entry->status == 'Approved' ? '#48bb78' : '#e53e3e' }}; color: white;">
                                            {{ $entry->status }}
                                        </span>
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
