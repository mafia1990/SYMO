<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryPropertyData;
use App\Season;
use App\Set;
use App\Style;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields=[];
        $fields['sets']=Set::all();
        $fields['sets']->load(['user','seasons','styles','point']);
       // dd( $fields['sets']->toJson());
        return view("pages.admin.sets.sets")->with('fields', $fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields=[];
        $fields['cats']=Category::all() ;
        $fields['seasons']=Season::all() ;
        $fields['styles']=Style::all() ;

        return view('pages.admin/sets/create')->with('fields',$fields);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
