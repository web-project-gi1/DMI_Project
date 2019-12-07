<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    //
    public $table="elements";
    protected $primaryKey = 'id';
    public $timestamps=false;
    public function module(){
        return $this->belongsTo('App\Module','moduleId');
    }
    public function user(){
        return $this->belongsTo('App\User','userId');
    }
    public function students(){
    	return $this->belongsToMany('App\Student','student_element','elementId','studentId');
    }
}