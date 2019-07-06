<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\CategoryPropertyData;
use App\Cloth;
use App\ClothCategoryPropertyData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ApiController extends Controller
{
/* Fetch clothes with 6 limit data
 * method post
 * requirements
 * skip field
 * filter fields
 *      colors[]
 *      pcats[]
 *      catid
 *      title
 * */
    public function clothes(Request $request){
//        $request['pcats']=[7];
//        $request['colors']=[222];
//        $request['title']="";
//        $request['catid']=[33];
//        $request['skip']=0;
        $colors=[];
        $pcats=[];
        foreach ($request['pcats'] as $pcat)
        {
            if($pcat!=0) array_push($pcats, $pcat);

        }
        foreach ($request['colors'] as $color)
        {
            if($color==0) $colors=0;

        }

        $cloths=Cloth::with('images')
            ->distinct()
            ->select(['cloths.*'])
            ->leftJoin('cloth_color','cloth_color.cloth_id','cloths.id')
            ->leftJoin('cloth_category_property_data','cloths.id','cloth_category_property_data.cloth_id')
            ->whereRaw('FIND_IN_SET(category_property_data_id, ? )>?',[ implode(",",$pcats),count($pcats)-1])
            ->where(function ($query) use ($request,$colors){
                if($colors==0)
                    $query->whereNotIn('cloth_color.color_id',[0]);
                else
                $query->whereIn('cloth_color.color_id',$request['colors']);

            })
            ->where('cloths.category_id',  $request['catid'])->where('cloths.title','like',  '%'.$request['title'].'%')
            ->skip($request['skip'])
            ->limit(6)
            ->get();



        //dd($cloths->toJson());

         return response($cloths->toJson());
    }


    public function backgroundDay(Request $request)
    {
        if($request->has('gender'))
        {
            $jsonData=[];
            if($request['gender']=='man')
                $jsonData['base64_image']=base64_encode( file_get_contents('images/backgroundday/man.png'));
            else
                $jsonData['base64_image']=base64_encode( file_get_contents('images/backgroundday/woman.jpg'));

        return response(  json_encode( $jsonData  ));
        }else return response("bad request",400);
    }

    public function categoryList(Request $request)
    {
        $cats=Category::all();
        return response($cats);
        }


}
