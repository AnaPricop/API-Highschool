<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['registration_number', 'firstname', 'lastname', 'class_id','date_of_birth', 'gender'];
    public function class_id()
    {
        $this->belongsTo('ClassStud', 'class_id');
    }
}
