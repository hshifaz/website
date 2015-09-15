<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceCategory extends Model
{
    protected $cast=[
        'status' => 'boolean',
    ];

    public static $rules=[
        'name'=>'required|between:5,255',
        'order'=>'integer',
        'status'=>'boolean',
    ];

    protected $fillable = ['name','order','status'];

    public function services()
    {
        return $this->hasMany('App\service');
    }
}
