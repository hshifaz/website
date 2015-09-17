<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    //
    protected  $fillable = [
        'bid_title',
        'tender_no',
        'open_bid_date',
        'pre_bid_date',
        'post_date',
        'remove_date',
        //'file_link'
    ];

    protected $dates = ['post_date'];

    public function scopeCurrent($query)
    {
        $query->where('post_date', '>=', Carbon::now()->subDay()->format('Y-m-d'));
    }

//    public function scopeUpcoming($query)
//    {
//        $query->where('pre_bid_date', '>=', Carbon::now()->subDay()->format('Y-m-d'));
//    }

    public function scopePast($query)
    {
        $query->where('post_date', '<', Carbon::now()->subDay()->format('Y-m-d'));
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
