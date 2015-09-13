<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\menu
 *
 */
class menu extends Model
{
    protected $cast=[
        'status' => 'boolean',
    ];

    public static $rules=[
        'caption'=>'required|between:3,50',
        'parent_id'=>'integer',
        'file'=>'mimes:jpeg,png,gif',
        'order'=>'integer',
        'status'=>'boolean',
    ];

    protected $fillable = ['caption','parent_id','file','order','status'];

}

