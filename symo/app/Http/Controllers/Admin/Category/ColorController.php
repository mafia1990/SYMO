<?php

namespace App\Http\Controllers\Admin\Category;

use App\Color;
use App\Http\Requests\ColorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.category.colors.colors');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.category.colors.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {

        $color = new Color();
        $color->code = $request['title'];


        $color->saveOrFail();
        return redirect()->back()->withSuccess('این رنگ با موفقیت ثبت شده است.');


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
        $color = Color::find($id);
        return  view("pages.admin.category.colors.edit",compact('color'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request, $id)
    {
        $color = Color::find($id);
        $color->code=$request['title'];
        $color->saveOrFail();
        return redirect()->back()->withSuccess('این رنگ با موفقیت به روز شده است.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Color::find($id)->delete();
        return response('ok');
    }
    public function datatable()
    {

        return DataTables::of(Color::all())->make(true);
    }
}
