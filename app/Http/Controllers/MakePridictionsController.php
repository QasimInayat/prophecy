<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use App\Match;
use App\Slider;
use App\BetInvest;
use App\HowItWork;
use Carbon\Carbon;
use App\Testimonial;
use App\WithdrawMethod;
use App\GatewayCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakePridictionsController extends Controller
{
    public function makePridictions(){

        $now = Carbon::now();
        $data['page_title'] = "MAKE PREDICTION";
        $data['sliders'] = Slider::latest()->get();
        $data['matches'] = Match::with('event')->whereStatus(1)->where('status', '!=' ,2)->where('end_date','>', $now)->orderBy('start_date','asc')->limit(20)->get();

        $data['users'] = User::count();
        $data['totalPrediction'] = BetInvest::count();
        $data['gateway'] = GatewayCurrency::where('status',1)->get();
        $data['withdraw'] = WithdrawMethod::where('status',1)->count();
        $date = Carbon::today()->subDays(7);
        return view('ui.make-pridictions',$data);
    }
}
