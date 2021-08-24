<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
class Match extends Model
{

     use SoftDeletes;
    protected $guarded = ['id'];
    protected  $table = "matches";

    protected $appends = [
        'name'
    ];

    public function getNameAttribute()
    {
        return  "<img src='".getFile(config('location.team.path').$this->team1_image)."' class='rounded-circle event-img '/> " .$this->team1 . ' <span class="text-info mx-2">Vs</span>' ." <img src='".getFile(config('location.team.path').$this->team2_image)."' class='rounded-circle event-img'/> " .$this->team2 ;
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function questions()
    {
        return $this->hasMany('App\BetQuestion','match_id');
    }
    public function questionsEndTime()
    {
        $now = Carbon::now();
        return $this->hasMany('App\BetQuestion','match_id')->whereStatus(1)->where('end_time','>=', $now);
    }
    public function options()
    {
        return $this->hasMany('App\BetOption','match_id');
    }
    public function betInvests()
    {
        return $this->hasMany('App\BetInvest','match_id');
    }

    public function totalBetInvests()
    {
        return $this->hasMany('App\BetInvest','match_id')->where('status','!=',2)->sum('invest_amount');
    }



}
