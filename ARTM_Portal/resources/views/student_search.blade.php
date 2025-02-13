<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Students') }}
        </h2>
    </x-slot>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Search input styling -->
                    <div class="mb-4">
                        <input type="text" name="search" id="search" 
                               style="background-color: #f1f5f9; border: 1px solid #ddd; color: #333; 
                                      border-radius: 8px; padding: 10px; width: 100%; 
                                      font-size: 14px; outline: none; transition: 0.3s;"
                               placeholder="Search Student Data" 
                               onfocus="this.style.backgroundColor='#e2e8f0'; this.style.borderColor='#2b6cb0';" 
                               onblur="this.style.backgroundColor='#f1f5f9'; this.style.borderColor='#ddd';">
                    </div>

                    <!-- Search results header -->
                    <h2 class="text-lg font-medium mb-4">
                        Search Results: <span id="total_records"></span>
                    </h2>

                    <!-- Table container for search results -->
                    <div class="table-responsive mt-4" id="student-table-container" style="display: none;">
                        <table style="width: 100%; border-collapse: collapse; border-radius: 8px; overflow: hidden;">
                            <thead style="background-color: #2b6cb0; color: white; text-align: left; font-weight: bold; text-transform: uppercase;">
                                <tr>
                                    <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Student ID</th>
                                    <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Name</th>
                                    <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Email</th>
                                    <th style="padding: 12px 16px; border-bottom: 2px solid #ddd;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="student-table" style="background-color: #f8fafc; color: #333;">
                                <!-- Search results will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            function fetch_student_data(query = '') {
                $.ajax({
                    url:"{{ route('student.search.results') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#student-table').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                });
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                if (query.length > 0) {
                    $('#student-table-container').show();
                    fetch_student_data(query);
                } else {
                    $('#student-table-container').hide();
                }
            });
        });
    </script>
</x-app-layout>
