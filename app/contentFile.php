<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contentFile extends Model
{
    public static $rules=[
        'desc'=>'string',
        'link'=>'mimes:jpeg,png,gif',
    ];

    protected $fillable = ['desc','link'];

    public function services()
    {
        return $this->belongsToMany('App\service');
    }
}
