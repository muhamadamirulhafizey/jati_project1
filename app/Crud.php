<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    public $table = "cruds";
    protected $fillable = ['title','body','result'];

    public function result(){
        return $this->belongsTo('App\result');
    }
}
