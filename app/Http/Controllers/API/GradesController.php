<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradesController extends Controller
{
    protected $namespace = '\App\Http\Controllers';

    public function index()
    {
        $users = DB::select('SELECT S.registration_number, S.firstname, S.lastname, M.subject_title, G.value, G.id from students S JOIN grades G ON S.registration_number = G.registration_number JOIN subjects M ON G.subject_id = M.id ORDER BY S.registration_number');
        return $users;
    }

    public function updateGrade(Request $request, $id)
    {
        $student = Grade::find($id);
        $student->registration_number = $request->input('registration_number');
        $student->subject_id = $request->input('subject_id');
        $student->value = $request->input('value');
//        $student->class = $request->input('class');
        $student->save();
        return response()->json('Student updated successfully');
    }

    public function verify($registration_number)
    {
        if (Student::where('registration_number', $registration_number)->exists()) {
            return 1;
        } else
            return 0;
    }

    public function store(Request $request)
    {
        if (Student::where('registration_number', $request->registration_number)->exists()) {
            $student = new Grade;
            $student->registration_number = $request->input('registration_number');
            $student->subject_id = $request->input('subject_id');
            $student->value = $request->input('value');
            $student->save();
            return response()->json('Grade added successfully');
        }
    }

    public function percentage()
    {
        $percentage = DB::select('select value, concat(round(( count(*)/(SELECT count(*) FROM grades) * 100 ),2),\'%\') AS percentage, count(*) AS number from grades group by value');
        return $percentage;
    }

    public function destroy($id)
    {
        Grade::where('id', $id)->delete();

        return response()->json('Professor deleted successfully');
    }
}
