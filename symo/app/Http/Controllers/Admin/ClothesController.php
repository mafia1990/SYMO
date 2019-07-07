<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryProperty;
use App\CategoryPropertyData;
use App\Cloth;
use App\ClothCategoryPropertyData;
use App\Color;
use App\Http\Requests\ClothesRequest;
use App\Image;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields=[];
        $fields['xc']='C';

        $fields['clothes']=Cloth::with('category','images')->get();

        return view('pages.admin.clothes.clothes')->with('fields',$fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $fields=[];
        $fields['cats']=Category::all();
        $fields['shops']=Shop::where('status',2)->get();
        $fields['colors']=\DB::table('colors')->get();
        return view('pages.admin.clothes.create')->with('fields',$fields);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClothesRequest $request)
    {

        $cloth=new Cloth();

        $cloth->title=$request['title'];
        $cloth->status=$request['status'];
        $cloth->sex=$request['sex'];
        $cloth->price=$request['amount'];
        $cloth->discount_type=$request['discount_type'];
        $cloth->discount=$request['discount'];
        $cloth->comment=$request['comment'];
        $cloth->shop_id=$request['shop_id'];
        $cloth->category_id=$request['category_id'];
        $cloth->save();
        $pics=preg_split("/[\s,]+/", $request['pic']);
        foreach ($pics as $pic){
            $picCloth=Image::find($pic);
            $picCloth->cloth_id=$cloth->id;
            $picCloth->save();
        }
        foreach ($request['pcats'] as $pcat){
            $ccp=new ClothCategoryPropertyData();
            $ccp->category_property_data_id=$pcat;
            $ccp->cloth_id=$cloth->id;
            $ccp->save();


        }
        foreach ($request['color'] as $color){
            $cloth->colors()->sync($color);

        }
       return redirect()->back()->withSuccess('با موفقیت لباس درج شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $fields['cloth']=Cloth::with('colors','images')->where('id',$id)->first();
        $fields['pclothd']=ClothCategoryPropertyData::where('cloth_id',$id)->get();
        $fields['clothImages']=$fields['cloth']->images()->get();
        $fields['pcatsd']=CategoryPropertyData::all();
        $fields['pcats']=CategoryProperty::all();
        $fields['cats']=Category::all();
        $fields['shops']=Shop::where('status',2)->get();
        $fields['colors']=\DB::table('colors')->get();
        $fields['clothColors']=$fields['cloth']->colors()->get();

        return view('pages.admin.clothes.edit')->with('fields',$fields);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClothesRequest $request, $id)
    {

        $cloth= Cloth::find($id);
        $cloth->title=$request['title'];
        $cloth->sex=$request['sex'];
        $cloth->shop_id=$request['shop_id'];
        $cloth->status=$request['status'];
        $cloth->category_id=$request['category_id'];
        $cloth->comment=$request['comment'];
        $cloth->price=$request['amount'];
        $cloth->discount_type=$request['discount_type'];
        $cloth->discount=$request['discount'];
        $cloth->save();
        $pics=preg_split("/[\s,]+/", trim($request['pic']));
        $images=Image::where('cloth_id',$cloth->id)->get()->pluck('id')->toArray();
        $imagesDel=array_diff($images,$pics);
        foreach ($imagesDel as $image){
            Image::find($image)->delete();
        }
        foreach ($pics as $pic){
            $picCloth=Image::find($pic);
            $picCloth->cloth_id=$cloth->id;
            $picCloth->save();
        }
        foreach ($request['pcats'] as $pcat){
            $ccp=new ClothCategoryPropertyData();
            $ccp->category_property_data_id=$pcat;
            $ccp->cloth_id=$cloth->id;
            $ccp->save();


        }
        //foreach ($request['color'] as $color){
            $cloth->colors()->sync($request['color']);

        //}
        return redirect()->back()->withSuccess('با موفقیت لباس درج شد.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cloth=Cloth::with('images')->where('id',$id)->first();
        foreach ($cloth->images()->get() as $image)
            \File::delete(@public_path(). $image->path);
        $cloth->delete();

        return response('ok');
    }
    public function datatable()
    {
        return DataTables::of(Cloth::with('category','images')->get())->make(true);
    }
}
