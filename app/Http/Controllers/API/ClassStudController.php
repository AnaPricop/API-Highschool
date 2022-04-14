<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClassStudResource;
use App\Models\ClassStud;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassStudController extends Controller
{
    public function index()
    {
        $classes = DB::select('SELECT * from class_studs');
        return $classes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        return ClassStud::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $registration_number
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($year, $group)
    {
        return ClassStud::where('year', $year)
            ->where('group', $group)->first()->id;
    }

    public function number()
    {
        $classes = DB::select('SELECT COUNT(id) as value from class_studs');
        return $classes;
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
        ClassStud::where('id', $id)->update($request->all());
        return response()->json('Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ClassStud $class)
    {
        $class->delete();

        return response()->json('Class deleted successfully');
    }
}
