<?php

namespace App\Http\Controllers\Admin;

use App\CategoryProperty;
use App\CategoryPropertyData;
use App\Color;
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
    public function categoryProperties(Request $request)
    {
        if(isset($request['id'])) {
            $catid = $request['id'];

            $pcats = CategoryProperty::all();
            $pcats_data = CategoryPropertyData::all();
            return view("pages.admin.clothes.template.clothloading", ['pcats_data' => $pcats_data, 'pcats' => $pcats, 'catid' => $catid]);

        }
    }
}
