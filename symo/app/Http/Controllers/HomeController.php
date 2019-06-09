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
            $fields['setsCount']= Set::where('status',1)->count();
            $fields['sets']= Set::all();
            $fields['sellersCount'] =User::where('type',5)->where('status',1)->count();
            $fields['sellers'] =User::where('type',5)->count();
            $fields['clothUnverifyCount']=  Cloth::where('status','1')->count();
            $fields['cloths']=  Cloth::with('images')->orderBy('created_at','desc')->get();
            $fields['likeCount']=  Like::all()->count();
        //    $clothCountbyweek = Cloth::select( DB::raw('count(id) as total'))
           //     ->groupBy(DB::raw('WEEK(created_at)'))->orderBy('created_at')->limit(2)->get();



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
            session()->put('permission', Auth::user()->type);
            return view('pages.dashboard')->with("fields",$fields);
        }

     //  if($user->roles()->get()->offsetExists('operator'));
      // echo 3;
      //  return view('auth.register');
    }

}
