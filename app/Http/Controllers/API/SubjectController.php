<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = DB::select('SELECT * from subjects');
        return $subjects;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        return Subject::create($request->all());
    }

    public function number()
    {
        $subjects = DB::select('SELECT COUNT(id) as value from subjects');
        return $subjects;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($subject_title)
    {
        $usersWithDivisionId = Subject::where('subject_title', $subject_title)->first();
        $id = $usersWithDivisionId->id;
        return $id;
    }
}
