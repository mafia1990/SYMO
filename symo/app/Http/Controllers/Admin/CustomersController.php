<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Admin.customers.customer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $imagename = "";
        $user = new User();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->phone = $request['phone'];
        $user->mobile = $request['mobile'];
        $user->status = $request['status'];
        $user->gender = $request['gender'];
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath, $imagename);
        }
        $user->avatar = $imagename;
        $user->save();
        return redirect()->back()->withSuccess('Successfully registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fields = User::find($id);

        return view("pages.admin.customers.edit")->with('fields', $fields);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        if ($request->has('statusChange')) {

            $user = User::where('id',$request['id'])->where('type','4')->first();
            if($user==null)  return response("not exist",404);
            if ($user->status == 2) $user->status = 0;
            else $user->status = 2;
            $user->save();
            return response("ok");
        }
        $this->validate(   $request,['email' => 'unique:users,email,'.$id]);
        $user=User::where('id',$id)->where('type',4)->first();
        if($user==null) return response("",400);
        if($request['password']=="")
            $request['password']=$user->password;
        $user->update($request->all());
        return back()->withSuccess('به روز رسانی با موفقیت انجام شد');
    }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public
        function destroy($id)
        {
            User::find($id)->delete();
            return response("ok");

        }

    public function datatable()
    {

        return DataTables::of(User::all()->where('type','4'))->make(true);
    }
    }
