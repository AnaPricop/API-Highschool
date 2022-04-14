<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Teaching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachingController extends Controller
{
    public function index()
    {
        $teachings = DB::select('SELECT * from teachings');
        return $teachings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return Teaching::create($request->all());

    }

    public function storeTeaching($subject_id, $class_id, $professor_id)
    {
        $post = new Teaching;
        $post->subject_id = $subject_id;
        $post->class_id = $class_id;
        $post->professor_id = $professor_id;
        $post->save();
        return response()->json([
            'message' => 'New post created'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Teaching::where('id', $id)->delete();

        return response()->json('Teaching deleted successfully');
    }
}
