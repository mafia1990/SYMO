<?php

namespace App\Http\Controllers\Admin;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.shops.shops');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers=User::where('type','5')->where('status',2)->get();
        return view('pages.admin.shops.create',compact('sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request)
    {
        $shop=new Shop();

        $shop->shop=$request['name'];
        $shop->phone=$request['phone'];
        $shop->mobile=$request['mobile'];
        $shop->address=$request['address'];
        $shop->description=$request['description'];
        $shop->status=$request['status'];
        if($request->hasFile('photo')){
                $image = $request->file('photo');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/shops');
                $image->move($destinationPath, $imagename);
                $shop->photo = $imagename;
        }

        $shop->save();
        $shop->users()->sync($request['seller']);
        return redirect()->back()->withSuccess('اطلاعات با موفقیت درج شد');
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

        $fields=[];
        $fields['sellers']=User::where('type','5')->where('status',2)->get();
        $fields['shop']=Shop::with('users')-> find($id);
        return view('pages.admin.shops.edit', compact('fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request, $id)
    {
        $shop=Shop::with('users')->find($id);
        $shop->shop=$request['name'];
        $shop->phone=$request['phone'];
        $shop->mobile=$request['mobile'];
        $shop->address=$request['address'];
        $shop->description=$request['description'];
        $shop->status=$request['status'];
        if($request->hasFile('photo')){
            if($shop->photo)
                  Helpers::deleteFile($shop->photo);
            $image = $request->file('photo');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/shops');
            $image->move($destinationPath, $imagename);
            $shop->photo = $imagename;
        }

        $shop->save();
        $shop->users()->sync($request['seller']);
        return redirect()->back()->withSuccess('اطلاعات با موفقیت درج شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $shop=Shop::find($id);
        if($shop->photo)
        Helpers::deleteFile($shop->photo);
        $shop->delete();



        return response("ok");


    }
    public function datatable()
    {
        return DataTables::of(Shop::with('clothes','users')->get())->make(true);
    }
}
