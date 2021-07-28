<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programmes;
use Storage;
use Illuminate\Support\Str;


class ProgrammesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programmes = Programmes::orderBy('priority',"asc")->get();
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"], ['name'=>"Programmes"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.programmes.index', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('programmes',$programmes);
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
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads/program/'.date('Y').'/'.date('M'), Str::uuid().$imageName, 'public');
        }
        $programmes = new Programmes;
        $programmes->name = $request->name;
        $programmes->description = $request->description;
        $programmes->image = $path;
        $programmes->status = 1;
        $programmes->priority = Programmes::max('priority')+1;
        try {
            $programmes->save();
            if ($programmes) {
                $return_data = array("success"=>true, "message"=>"Program Added Successfully");

            }else{
                $return_data = array("success"=>false, "message"=>"Program Addition Failed");

            }
        } catch (\Throwable $th) {
            $return_data = array("success"=>false, "message"=>"Program Addition Failed");
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
        // dd($id);
        //
        try {
            $data = Programmes::find($id);
            // dd($data);
            if ($data->count() > 0) {
                $html = view('pages.programmes.show')->with('program',$data)->render();
                $return_data = array("success"=>true, 'html'=>$html);

            }else{
                $return_data = array("success"=>false, "message"=>"No Programs Found");

            }
        } catch (\Throwable $th) {
            //throw $th;
            $return_data = array("success"=>false, "message"=>"Error in getting programmes data");
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
        $data = Programmes::find($id);
       $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"],['link' => "/admin/programmes", 'name' => "Programmes"], ['name'=>"Edit"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.programmes.edit', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('program',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all(),Programmes::find($id)->image);
        $programmes = Programmes::find($id);
        $currentImage = $programmes->image;
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads/program/'.date('Y').'/'.date('M'),Str::uuid().$imageName, 'public');
            $programmes->image = $path;
            if ($currentImage != "") {
                //delete the current image
                Storage::disk('public')->delete($currentImage);

            }
        }
        $programmes->name = $request->name;
        $programmes->description = $request->description;

        try {
            $programmes->save();
            if ($programmes) {
                return redirect()->route('admin_programmes')->with  ('success','Program Updated Successfully');


            }else{
                return redirect()->route('admin_programmes')->with('error','Program Updation failed');

            }
        } catch (\Throwable $th) {
            return redirect()->route('admin_programmes')->with('error','Program Updation failed');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try {
            //delelte the image related to the news
            $programme = Programmes::find($request->id);
            $imagePath = $programme->image;
            if ($imagePath) {
               $delete = $this->removeImage($imagePath);
            }
            $programme = Programmes::destroy($request->id);
            $return_data = array("success"=>true, "message"=>"Program Deleted Successfully");
        } catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success"=>false, "message"=>"Program Deletion Failed",'error'=> $th);
        }
        return json_encode($return_data);
    }

    public function toggleStatus(Request $request)
    {
        $id = $request->id;
        $programme = Programmes::find($id);
        if ($programme->status) {
            $programme->status = 0;
        }else {
            $programme->status = 1;
        }
        try {
            $programme->save();
            $return_data = array("success"=>true, "message"=>"Status Changed Successfully");

        } catch (\Throwable $th) {
            $return_data = array("success"=>true, "message"=>"Status Changing Failed");

        }
        return json_encode($return_data);

    }
      //Remove image from storage
      public function removeImage($imageUrl)
      {
          if (Storage::disk('public')->exists($imageUrl)) {
                 $delete = Storage::disk('public')->delete($imageUrl);
                 return $delete;
          }
      return null;

      }
}
