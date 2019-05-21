

@extends('layouts.masterdashboard')
@section('BODY')

@if(session()->get('permission')==1)

    @include('pages.dashboardtype.admindashboard')
@elseif(session()->get('permission')=="operator")

    @include('pages.dashboardtype.operatordashboard')
@else
    @php
    $point=DB::table('designer_point')->where('designerid',Auth::user()->id )->avg('point') ;
     $_sets=DB::table('sets')->where('status','false')->take(40)->get();
    $sets=array();
    for ($i=0;$i<count($_sets);$i++){
        if( isset($_sets[$i+1]) && $_sets[$i]->setid==$_sets[$i+1]->setid) continue;
        array_push( $sets,$_sets[$i]);
    }
    @endphp
    @include('pages.dashboardtype.designerdashboard')


@endif


@endsection