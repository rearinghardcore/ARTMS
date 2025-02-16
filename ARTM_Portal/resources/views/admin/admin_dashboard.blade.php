<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrator Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white white:bg-gray-800 overflow-x:scroll shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 white:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Students</h3>
                    <table style="width: 100%; border-collapse: collapse; border-radius: 8px; overflow-x: scroll;">
                        <thead style="background-color: #2b6cb0; color: white; text-align: left; font-weight: bold; text-transform: uppercase;">
                            <tr>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Student ID</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Name</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Email</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Number of Late Entries</th>
                                <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #f8fafc; color: #333; text-align: left;">
                            @foreach ($students as $student)
                            <tr style="border-bottom: 1px solid #ddd; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#edf2f7'" onmouseout="this.style.backgroundColor='';">

                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $student->student_id }}</td>
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $student->name }}</td>
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $student->email }}</td>
                                    <td style="padding: 12px 16px; border-right: 1px solid #ddd; text-align: center;">{{ $student->late_entries_count }}</td>
                                    <td style="padding: 12px 16px; text-align: center;">
                                        <a href="{{ route('admin.student.late-entries', $student->id) }}" style="color: #3182ce; font-weight: 600; text-decoration: none; padding: 6px 12px; border-radius: 4px; background-color: #e2e8f0; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#cbd5e0'" onmouseout="this.style.backgroundColor='#e2e8f0'">
                                            View Late Entries
                                        </a>
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
