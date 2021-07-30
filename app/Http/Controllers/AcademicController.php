<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academics;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academics = Academics::all();
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"], ['name'=>"Academics"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.academics.index', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('academics',$academics);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        // dd($request->all());
        $academics               = new Academics;
        $academics->name         = $request->name;
        $academics->description  = $request->description != '<p><br></p>' ? $request->description : "";
        $academics->organisation = $request->organisation!= '<p><br></p>' ? $request->organisation : "";
        $academics->objectives   = $request->objectives!= '<p><br></p>' ? $request->objectives : "";
        $academics->time_table   = $request->time!= '<p><br></p>' ? $request->time : "";
        $academics->priority     = Academics::max('priority')+1;
        try {
            $academics->save();
            if($academics){
                $return_data = array("success"=>true, "message"=>"Academics Added Successfully");
            }else {
                $return_data = array("success"=>false, "message"=>"Academics Addition Failed");
            }
        } catch (\Throwable $th) {
            //throw $th;
            $return_data = array("success"=>false, "message"=>"Academics Addition Failed");

        }
        return json_encode($return_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Academics::find($id);
            // dd($data);
            if ($data->count() > 0) {
                // dd($data->toArray());
                $html = view('pages.academics.show')->with('academics',$data)->render();
                $return_data = array("success"=>true, 'html'=>$html);

            }else{
                $return_data = array("success"=>false, "message"=>"No Academics Found");

            }
        } catch (\Throwable $th) {
            //throw $th;
            $return_data = array("success"=>false, "message"=>"Error in getting academics data");
        }

        return json_encode($return_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Academics::find($id);
        $breadcrumbs = [
             ['link' => "javascript:void(0)", 'name' => "Administration"],['link' => "/admin/academics", 'name' => "Academics"], ['name'=>"Edit"]
         ];
         $pageConfigs = ['pageHeader' => true];
 
         return view('pages.academics.edit', ['pageConfigs' => $pageConfigs],[
             'breadcrumbs' => $breadcrumbs
         ])->with('academic',$data);
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
        $academics               = Academics::find($id);
        $academics->name         = $request->name;
        $academics->description  = $request->description != '<p><br></p>' ? $request->description : "";
        $academics->organisation = $request->organisation!= '<p><br></p>' ? $request->organisation : "";
        $academics->objectives   = $request->objectives!= '<p><br></p>' ? $request->objectives : "";
        $academics->time_table   = $request->time!= '<p><br></p>' ? $request->time : "";   
        try {
            $academics->save();
            if($academics){
                $return_data = array("success"=>true, "message"=>"Academics Updated Successfully");
            }else {
                $return_data = array("success"=>false, "message"=>"Academics Updation Failed");
            }
        } catch (\Throwable $th) {
            //throw $th;
            $return_data = array("success"=>false, "message"=>"Academics Updation Failed");

        }
        return json_encode($return_data); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            //delelte the image related to the news
            $academicDelete = Academics::destroy($request->id);
            $return_data = array("success"=>true, "message"=>"Academics Deleted Successfully");
        } catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success"=>false, "message"=>"Academics Deletion Failed",'error'=> $th);
        }
        return json_encode($return_data);
    }
    public function toggleStatus(Request $request)
    {
        $id = $request->id;
        $facility = Academics::find($id);
        if ($facility->status) {
            $facility->status = 0;
        }else {
            $facility->status = 1;
        }
        try {
            $facility->save();
            $return_data = array("success"=>true, "message"=>"Status Changed Successfully");

        } catch (\Throwable $th) {
            $return_data = array("success"=>true, "message"=>"Status Changing Failed");

        }
        return json_encode($return_data);

    }
}
