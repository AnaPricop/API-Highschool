<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $users = DB::select('SELECT S.registration_number, S.firstname, S.lastname, S.gender, C.year, C.group from students S join class_studs C ON S.class_id = C.id');
        return $users;
    }

    public function topStudents()
    {
        $users = DB::select('SELECT S.registration_number, S.firstname, S.lastname, AVG(N.value) as value FROM students S JOIN grades N ON S.registration_number=N.registration_number GROUP BY S.registration_number, S.firstname, S.lastname ORDER BY AVG(N.value) DESC LIMIT 3');
        return $users;
    }

    public function number()
    {
        $students = DB::select('SELECT COUNT(registration_number) as value from students');
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        Student::create($request->all());
        $id = DB::getPdo()->lastInsertId();
        $email = 'student' . $id . '@gmail.com';
        $password = 'student' . $id;
        DB::table('users')->insert([
            'name' => $request->firstname,
            'email' => $email,
            'password' => bcrypt($password),
            'isAdmin' => 0
        ]);
        return DB::getPdo()->lastInsertId();
    }

    /**
     * Display the specified resource.
     *
     * @param int $registration_number
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($registration_number)
    {
        $students = Student::find($registration_number);
        if (is_null($students)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new StudentResource($students)]);
    }

    public function showIndividualGrades($registration_number)
    {
        $grades = DB::select('SELECT S.subject_title, G.value from subjects S join grades G on S.id = G.subject_id where G.registration_number = ?', [$registration_number]);
        return $grades;
    }

    public function showAverage($registration_number)
    {
        $average = DB::select('SELECT AVG(G.value) as value from subjects S join grades G on S.id = G.subject_id where G.registration_number = ?', [$registration_number]);
        return $average;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $registration_number)
    {
        Student::where('registration_number', $registration_number)->update($request->all());
        return response()->json('Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($registration_number)
    {
        Student::where('registration_number', $registration_number)->delete();

        return response()->json('Student deleted successfully');
    }
}
