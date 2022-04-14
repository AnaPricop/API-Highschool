<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfessorResource;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = DB::select('SELECT P.id, P.firstname, P.lastname, P.gender, C.year, C.group, S.subject_title from professors P JOIN teachings T on P.id = T.professor_id JOIN class_studs C ON T.class_id = C.id join subjects S on T.subject_id = S.id');

        return $professors;
    }

    public function indexWithTeaching()
    {
        $professors = DB::select('SELECT P.id, P.firstname, P.lastname, P.gender, IFNULL(C.year, 0), IFNULL(C.group, 0), IFNULL(S.subject_title, 0) from professors P JOIN teachings T on P.id = T.professor_id JOIN class_studs C ON T.class_id = C.id join subjects S on T.subject_id = S.id');
        return $professors;
    }

    public function number()
    {
        $professors = DB::select('SELECT COUNT(id) as value from professors');
        return $professors;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Professor::create($request->all());
        return DB::getPdo()->lastInsertId();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $professor = Professor::find($id);
        if (is_null($professor)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new ProfessorResource($professor)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        Professor::where('id', $id)->update($request->all());
        return response()->json('Professor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Professor::where('id', $id)->delete();

        return response()->json('Professor deleted successfully');
    }

}
