<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryProperty;
use App\CategoryPropertyData;
use App\Cloth;
use App\Color;
use App\Image;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    public function loadpage(Request $request){

        $data=[];
        $data['colors']=Color::all();
        $data['pcats']=CategoryProperty::all();
        $data['pcats_data']=CategoryPropertyData::all();
        $data['catid']=$request['id'];

        return response($data);



    }
    public function deletefile(Request $request){
//
        $image=Image::where('name', $request['_name'])->first();
        \File::delete(@public_path(). $image->path);
        $id=$image->id;
        $image->delete();

        return response()->json([
            'photo_id' => $id
        ]);

    }
    public function uploadfile(Request $request)
    {
        if ($request->hasFile('file')) {
            $this->validate(   $request,['file' => 'max:1000|mimes:png,jpg,jpeg']);

            $uploadedFile = $request->file('file');
            $filename = time() . $uploadedFile->getClientOriginalName();
            $original_name = $uploadedFile->getClientOriginalName();
            $destinationPath = public_path('/images/clothes');
            $uploadedFile->move($destinationPath, $filename);


            $image = new Image();
            $image->path = $filename;
            $image->name = $request['_name'];
            $image->save();

            return response()->json([
                'photo_id' => $image->id
            ]);
        }
        return response("",400);

    }
    public function categoryProperties(Request $request)
    {
        if(isset($request['id'])) {
            $catid = $request['id'];

            $pcats = CategoryProperty::all();
            $pcats_data = CategoryPropertyData::all();
            return view("pages.admin.clothes.template.clothloading", ['pcats_data' => $pcats_data, 'pcats' => $pcats, 'catid' => $catid]);

        }
    }
    public function fetchCategoryProperties(Request $request)
    {
        if(isset($request['category_id'])) {
            $catp =CategoryProperty::where('category_id', $request['category_id'])->get();

                return response( $catp);

        }
    }
}
