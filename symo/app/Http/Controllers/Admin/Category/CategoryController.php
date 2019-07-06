<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Helpers;

class CategoryController extends Controller
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
        $fields['category']=Category::all();

        return view('pages.admin.category.category')->with('fields',$fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/cats');
            $image->move($destinationPath, $imagename);

            $cat = new Category();
            $cat->name = $request['title'];
            $cat->sex = $request['sex'];
            $cat->image = $imagename;
            $cat->save();
             return redirect()->back()->withSuccess('این مشخصه با موفقیت ثبت شده است.');
        }
        return redirect()->back()->withErrors('خطا در ثبت داده ها');
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
        $fields=Category::find($id);
        return view("pages.admin.category.edit")->with('fields',$fields);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $cat=Category::find($id);
        $cat->name = $request['title'];
        $cat->sex = $request['sex'];
        if ($request->hasFile('image')) {

            Helpers::deleteFile($cat->image);

            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/cats');
            $image->move($destinationPath, $imagename);



            $cat->image = $imagename;


        }

            $cat->saveOrFail();
        return redirect()->back()->withSuccess('این مشخصه با موفقیت ثبت شده است.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cat= Category::find($id);
        Helpers::deleteFile($cat->image);
        $cat->delete();
        return response('ok');
    }
    public function datatable()
    {

        return DataTables::of(Category::all())->make(true);
    }
}
