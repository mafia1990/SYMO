<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryProperty;
use App\CategoryPropertyData;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Season;
use App\Style;
use Illuminate\Http\Request;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields['cats']=Category::all();
        $fields['seasons']=Season::all();
        $fields['pcats']=CategoryProperty::all();
        $fields['styles']=Style::all();

        return view('pages.admin.setting')->with('fields',$fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingsRequest $data)
    {

        $op = $data['op'];
        $imagename = "";
        $id = 0;
        if ($op == 'add') {
            //  $this->validate->validateSetting($data);
            if ($data->hasFile('category-image')) {

                $image = $data->file('category-image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/cats');
                $image->move($destinationPath, $imagename);
                $id = Category::insertGetId(['name' => $data['name'], 'image' => $imagename]);
                $data = "{
                 \"id\": \"$id\"
                }";
                return response($data,200);

            }
            else if ($data->has('catid')) {
                    $id=CategoryProperty::insertGetId(['name'=>$data['name'],'catid'=>$data['catid']]);
                    $data = "{
                     \"id\": \"$id\"
                    }";
                    return response($data,200);
            }
            else if ($data->has('pcatid')) {
                $id=CategoryPropertyData::insertGetId(['name'=>$data['name'],'catpid'=>$data['pcatid']]);
                $data = "{
                     \"id\": \"$id\"
                    }";
                return response($data,200);
            } else if ($data->has('cat') && $data['cat']=='season') {
                $id=Season::insertGetId(['name'=>$data['name']]);
                $data = "{
                     \"id\": \"$id\"
                    }";
                return response($data,200);
            } else if ($data->has('cat') && $data['cat']=='style') {
                $id=Style::insertGetId(['name'=>$data['name']]);
                $data = "{
                     \"id\": \"$id\"
                    }";
                return response($data,200);
            }

        } else if ($op == 'changecat') {
            $data = CategoryProperty::where('catid', $data['catid'])->get()->toJson();
            return response($data, 200);
        }else if ($op == 'changepcat') {
            $data = CategoryPropertyData::where('catpid', $data['pcatid'])->get()->toJson();
            return response($data, 200);
        }

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
        switch ($request['type']){
            case 'category':
                $cat=Category::find( $id);

                if(\File::exists($cat->image)) {

                    \File::delete($cat->image);
                }

                $cat->delete();
                return response($request['index']);
            case 'category_properties':
                CategoryProperty::find($id)->delete();
                return response($request['index']);
            case 'category_properties_data':
                CategoryPropertyData::find($id)->delete();
                return response($request['index']);
            case 'season':
                Season::find($id)->delete();
                return response($request['index']);
            case 'style':
                Style::find($id)->delete();
                return response($request['index']);

        }
        return response("",400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
