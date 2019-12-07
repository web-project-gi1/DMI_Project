<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    //
    public $table="filieres";
    protected $primaryKey = 'id';
    public $timestamps=false;
    public function user(){
        return $this->belongsTo('App\User','userId');
    }
    
    public function modules(){
    	return $this->hasMany('App\Module','filiereId');
    }
}
