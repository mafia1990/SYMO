<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\CategoryProperty;
use App\Http\Requests\CategoryPropertiesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class CategoryPropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        return view("pages.admin.category.categoryproperties.categoryproperties");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::pluck('name','id')->toArray();
        return view("pages.admin.category.categoryproperties.create")->with('cat',$cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPropertiesRequest $request)
    {
        $catp=new CategoryProperty();

        $catp->category_id=$request['category_id'];
        $catp->name=$request['title'];
        $catp->multiselect=$request['multiselect'];
        $catp->saveOrFail();
        return redirect()->back()->withSuccess('این مشخصه با موفقیت ثبت شده است.');
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
        $fields['cat']=Category::pluck('name','id')->toArray();
        $fields['catp']=CategoryProperty::find($id);

        return view("pages.admin.category.categoryproperties.edit")->with('fields',$fields);
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
        $catp=CategoryProperty::find($id);

        $catp->category_id=$request['category_id'];
        $catp->name=$request['title'];
        $catp->multiselect=$request['multiselect'];
        $catp->saveOrFail();
        return redirect()->back()->withSuccess('بروز رسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        CategoryProperty::find($id)->delete();
        return response('ok');
    }
    public function datatable()
    {

        return DataTables::of(CategoryProperty::with('category'))->make(true);
    }
}
