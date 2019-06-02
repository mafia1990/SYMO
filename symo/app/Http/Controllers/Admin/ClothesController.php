<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryPropertyData;
use App\Cloth;
use App\ClothCategoryPropertyData;
use App\Color;
use App\Http\Requests\ClothesRequest;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $cloth->status=0;
        $cloth->category_id=$request['category'];
        $cloth->comment=$request['comment'];
        $cloth->save();

        foreach ($request['pcats'] as $pcat){
            $ccp=new ClothCategoryPropertyData();
            $ccp->category_property_data_id=$pcat;
            $ccp->cloth_id=$cloth->id;
            $ccp->save();


        }
        foreach ($request['color'] as $color){
            $cloth->colors()->attach($color);

        }
        foreach ($request->file('pic') as $pic){

            $imagename = time() . '.' . $pic->getClientOriginalExtension();
            $destinationPath = public_path('/images/clothes');
            $pic->move($destinationPath, $imagename);
            $image=new Image();
            $image->path=$imagename;
            $image->cloth_id=$cloth->id;;
            $image->save();

        }

       return redirect()->back()->withSuccess('Successfully Added.');
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

        Cloth::find($id)->delete();
        return response('ok');
    }
}
