<?php

namespace App\Http\Controllers;

use App\Cloth;
use App\Like;
use App\Role;
use App\Helpers;
use App\Set;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * user type
     * 1 Admin
     * 2 operator
     * 3 designer
     * 4 customer
     * 5 seler
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $fields['name']=$user->name;
        if($user->type==1){
            $fields['setsCount']= Set::where('status',0)->count();
            $fields['sets']= Set::all();
            $fields['sellersCount'] =User::where('type',5)->where('status',0)->count();
            $fields['sellers'] =User::where('type',5)->count();
            $fields['clothUnverifyCount']=  Cloth::where('status','0')->count();
            $fields['cloths']=  Cloth::with('images')->get();
            $fields['likeCount']=  Like::all()->count();
            $fields['userUnverifyCustomerCount'] =User::where('type',4)->where('status',1)->count();
            $fields['userCustomerCount'] = User::where('type',4)->where('status',2)->count();
            $fields['CustomerCount'] = User::where('type',4)->get();
            $fields['operatorCount'] = User::where('type',2)->count();
            $fields['designerCount'] = User::where('type',3)->count();
            $fields['userCount']=User::all()->count();
            $fields['notifies']= [];
            $fields['visitors']= 0;
            $fields['orders']= 0;
            $fields['space']= 0;
            $fields['sessionchats']= [];

            ///////////////////////////////
            /// check rate growth
            /////////////////////////////////
            $clothCountbyweek = Cloth::select( DB::raw('count(id) as total'))
                ->groupBy(DB::raw('WEEK(created_at)'))->orderBy('created_at')->limit(2)->get();
            if($clothCountbyweek==null)
            $fields['rateCloths']=Helpers::growth_rate_check($clothCountbyweek[1]['total'],$clothCountbyweek[0]['total']);
                else $fields['rateCloths']=0;
            $likeCountbyweek = Like::select( DB::raw('count(id) as total'))
                ->groupBy(DB::raw('WEEK(created_at)'))->orderBy('created_at')->limit(2)->get();
            if(count($likeCountbyweek))
            $fields['rateLikes']=Helpers::growth_rate_check($likeCountbyweek[1]['total'],$likeCountbyweek[0]['total']);
            else  $fields['rateLikes']=0;

            $fields['rateComment']=30;
            $fields['rateUpload']=20;
            ///////////////
            session()->put('permission', Auth::user()->type);

            return view('pages.dashboard')->with("fields",$fields);
        }

     //  if($user->roles()->get()->offsetExists('operator'));
      // echo 3;
      //  return view('auth.register');
    }

}
