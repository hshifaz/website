<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contentFileType extends Model
{

    public static $rules=[
        'extension'=>'required|between:3,4',
        'desc'=>'string',
        'type'=>'required|string',
    ];

    protected $fillable = ['extension','desc','type'];
/*
    public function contentFile()
    {
        return $this->hasMany('contentFile');
    }
*/
}
