<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsencesController extends Controller
{
    public function showFailingStudents()
    {
        $users = DB::select('SELECT S.registration_number, S.firstname, S.lastname, COUNT(N.id) as number FROM students S JOIN absences N ON S.registration_number=N.registration_number GROUP BY S.registration_number, S.firstname, S.lastname HAVING COUNT(N.id) >10');
        return $users;
    }
    public function showAbsences()
    {
        $users = DB::select('SELECT S.registration_number, S.firstname, S.lastname, COUNT(N.id) as number FROM students S JOIN absences N ON S.registration_number=N.registration_number GROUP BY S.registration_number, S.firstname, S.lastname');
        return $users;
    }
}
