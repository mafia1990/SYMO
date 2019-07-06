<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\SeasonRequest;
use App\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.category.seasons.seasons');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.category.seasons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeasonRequest $request)
    {

        $season = new Season();
        $season->name = $request['title'];


        $season->saveOrFail();
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
        $season = Season::find($id);
        return  view("pages.admin.category.seasons.edit",compact('season'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeasonRequest $request, $id)
    {
        $season = Season::find($id);
        $season->name=$request['title'];
        $season->saveOrFail();
        return redirect()->back()->withSuccess('این مشخصه با موفقیت به روز شده است.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Season::find($id)->delete();
        return response('ok');
    }
    public function datatable()
    {

        return DataTables::of(Season::all())->make(true);
    }
}
