<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    protected  $fillable = [
        'title',
        'department',
        'due_date',
        'post_date',
        'remove_date',
        //'attachment',
    ];

    protected $dates = ['post_date'];

    public function scopePublished($query)
    {
        $query->where('post_date', '>=', Carbon::now()->subDay()->format('Y-m-d'));
    }

    public function scopeUnPublished($query)
    {
        $query->where('due_date', '<', Carbon::now()->subDay()->format('Y-m-d'));
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['post_date'] = Carbon::parse($date);
    }

    public function contentFiles()
    {
        return $this->belongsToMany('App\contentFile');
    }
}
