<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $table = "results";
    protected $fillable = ['name','result'];

   
    public function cruds(){
        return $this->hasMany('App\cruds');
    }
}
