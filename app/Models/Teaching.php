<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'class_id', 'professor_id'];
    /**
     * @var mixed
     */

    public function subject_id()
    {
        $this->belongsTo('Subject', 'subject_id');
    }
    public function class_id()
    {
        $this->belongsTo('ClassStud', 'class_id');
    }
    public function professor_id()
    {
        $this->belongsTo('Professor', 'professor_id');
    }
//    function create($request) {
//        $this->subject_id = $request->subject_id;
//        $this->class_id = $request->class_id;
//        $this->professor_id = $request->professor_id;
//        $this->save();
//        return $this->id;
//    }
}
