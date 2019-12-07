<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    public $table="modules";
    protected $primaryKey = 'id';
    public $timestamps=false;

    public function user(){
        return $this->belongsTo('App\User','userId');
    }

    public function filiere(){
        return $this->belongsTo('App\Filiere','filiereId');
    }
    
    public function elements(){
        return $this->hasMany('App\Element','moduleId');
    }
}
