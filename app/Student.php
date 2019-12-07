<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public $table="students";
    protected $primaryKey = 'id';
    public $timestamps=false;

    public function elements(){
    	return $this->belongsToMany('App\Element','student_element','studentId','elementId');
    }
}
