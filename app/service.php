<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $cast=[
        'status' => 'boolean',
    ];

    public static $rules=[
        'name'=>'required|between:5,100',
        'desc'=>'string',
        'icon'=>'string',
        'link'=>'string',
        'featured'=>'boolean',
        'order'=>'integer',
        'status'=>'boolean',
    ];

    protected $fillable = ['name','desc','icon','link','featured','order','status'];

    public function serviceCategory()
    {
        return $this->belongsTo('serviceCategory');
    }

    public function contentFiles()
    {
        return $this->belongsToMany('App\contentFile');
    }
}
