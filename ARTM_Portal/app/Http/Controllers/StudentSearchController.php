<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentSearchController extends Controller
{
    public function index()
    {
        return view('student_search');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $students = User::where('usertype', 'student')
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('email', 'LIKE', "%{$query}%")
                  ->orWhere('student_id', 'LIKE', "%{$query}%");
            })
            ->get();
            $total_data = $students->count();
            if ($query = '' || $query = null) {
                $total_data = $students->count(0);
            }
            else {
                $total_data = $students->count();
            }

        $table_data = '';

        foreach ($students as $student) {
            $table_data .= '
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">'.$student->student_id.'</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">'.$student->name.'</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">'.$student->email.'</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        <a href="'.route('admin.student.late-entries', $student->id).'" class="text-blue-600 hover:text-blue-900">View Late Entries</a>
                    </td>
                </tr>
            ';
        }

        $data = array(
            'table_data' => $table_data,
            'total_data' => $total_data
        );
       
        return response()->json($data);
    }
    
}
