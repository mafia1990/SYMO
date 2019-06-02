<?php

namespace App\Http\Controllers;

use App\Cloth;
use App\Role;
use App\Set;
use App\User;
use Auth;
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
            $fields['selerCount'] =User::where('type',5)->where('status',2)->count();
            $fields['clothUnverifyCount']=  Cloth::where('status','1')->count();
            $fields['clothes']=  Cloth::where('status','2')->get();
            $fields['userUnverifyCustomerCount'] =User::where('type',4)->where('status',1)->count();
            $fields['userCustomerCount'] = User::where('type',4)->where('status',2)->count();
            $fields['customerCount']=User::all()->count();
            $fields['notifies']= [];
            $fields['visitors']= 0;
            $fields['orders']= 0;
            $fields['space']= 0;
            $fields['sessionchats']= [];
            session()->put('permission', Auth::user()->type);

          //  $test->each(function($i){
           //     echo $i->name;

          //  });
            return view('pages.dashboard')->with("fields",$fields);
        }

     //  if($user->roles()->get()->offsetExists('operator'));
      // echo 3;
      //  return view('auth.register');
    }

}
