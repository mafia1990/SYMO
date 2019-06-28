<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;

class OperatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *  user type
     * 1 Admin
     * 2 operator
     * 3 designer
     * 4 customer
     * 5 seler
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields=[];
        $fields['operators']= User::where("type",2)->get();
        return view("pages.admin.operators.operator")->with('fields',$fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.operators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $user->address = $request['address'];
        $user->status = $request['status'];
        $user->type =2;
        $user->gender = $request['gender'];
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users/operators');
            $image->move($destinationPath, $imagename);
        }
        $user->avatar = $imagename;
        $user->save();
        return redirect()->back()->withSuccess('با موفقیت اطلاعات شما ثبت شده است.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fields = User::find($id);

        return view("pages.admin.operators.edit")->with('fields', $fields);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('statusChange')) {

            $user = User::where('id',$request['id'])->where('type','2')->first();
            if($user==null)  return response("not exist",404);
            if ($user->status == 2) $user->status = 0;
            else $user->status = 2;
            $user->save();
            return response("ok");
        }
        $this->validate(   $request,['email' => 'unique:users,email,'.$id]);
        $user=User::where('id',$id)->where('type',2)->first();
        if($user==null) return response("",400);
        if($request['password']=="")
            $request['password']=$user->password;
        $user->update($request->all());
        return back()->withSuccess('به روز رسانی با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response("ok");
    }
    public function datatable()
    {

        return DataTables::of(User::all()->where('type','2'))->make(true);
    }
}
