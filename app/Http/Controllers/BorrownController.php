<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class BorrownController extends Controller
{
    function create() {
        return view('borrows.create');
    }

    function searchStudent(Request $request){
        $keyword = $request->keyword;
        $students = Student::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('student_code', 'LIKE', '%' . $keyword . '%')
            ->get();
        return response()->json($students);
    }

    function findStudent($id) {
        $student = Student::find($id);
        return response()->json($student);
    }
}
