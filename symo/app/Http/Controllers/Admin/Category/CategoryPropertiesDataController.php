<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\CategoryProperty;
use App\CategoryPropertyData;
use App\Http\Requests\CategoryPropertiesDataRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class CategoryPropertiesDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view("pages.admin.category.categoryproperties.categorypropertiesdata.categorypropertiesdata");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields=[];
        $fields['cat']=Category::pluck('name','id')->toArray();
       // $fields['catp']=CategoryProperty::pluck('name','id')->toArray();
        return view("pages.admin.category.categoryproperties.categorypropertiesdata.create")->with('fields',$fields);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPropertiesDataRequest $request)
    {
        $catpd=new CategoryPropertyData();

        $catpd->categoryproperties_id=$request['categoryproperties_id'];
        $catpd->name=$request['title'];
        $catpd->saveOrFail();
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
        $fields['catp']=CategoryProperty::pluck('name','id')->toArray();
        $fields['catpd']=CategoryPropertyData::with('categoryproperties','categoryproperties.category')->find($id);
        return view("pages.admin.category.categoryproperties.categorypropertiesdata.edit")->with('fields',$fields);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryPropertiesDataRequest $request, $id)
    {
        $catpd=CategoryPropertyData::find($id);
        $catpd->categoryproperties_id=$request['categoryproperties_id'];
        $catpd->name=$request['title'];
        $catpd->saveOrFail();
        return redirect()->back()->withSuccess('این مقدار مشخصه با موفقیت ثبت شده است.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        CategoryPropertyData::find($id)->delete();
        return response('ok');
    }
    public function datatable()
    {

        return DataTables::of(CategoryPropertyData::with('categoryproperties','categoryproperties.category'))->make(true);
    }
}
