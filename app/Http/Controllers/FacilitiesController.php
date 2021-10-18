<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use Storage;
use Illuminate\Support\Str;


class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facilities = Facilities::orderBy('priority',"asc")->get();
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"], ['name'=>"Facilities"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.facilities.index', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('facilities',$facilities);
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

            $path = $request->file('image')->storeAs('uploads/facility/'.date('Y').'/'.date('M'), Str::uuid().$imageName, 'public');
        }
        $facilities = new Facilities;
        $facilities->name = $request->name;
        $facilities->description = $request->description;
        $facilities->image = $path;
        $facilities->status = 1;
        $facilities->priority = Facilities::max('priority')+1;
        try {
            $facilities->save();
            if ($facilities) {
                $return_data = array("success"=>true, "message"=>"Facility Added Successfully");

            }else{
                $return_data = array("success"=>false, "message"=>"Facility Addition Failed");

            }
        } catch (\Throwable $th) {
            $return_data = array("success"=>false, "message"=>"Facility Addition Failed");
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
            $data = Facilities::find($id);
            // dd($data);
            if ($data->count() > 0) {
                $html = view('pages.facilities.show')->with('facility',$data)->render();
                $return_data = array("success"=>true, 'html'=>$html);

            }else{
                $return_data = array("success"=>false, "message"=>"No Programs Found");

            }
        } catch (\Throwable $th) {
            //throw $th;
            $return_data = array("success"=>false, "message"=>"Error in getting facilities data");
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
        $data = Facilities::find($id);
       $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"],['link' => "/admin/facilities", 'name' => "Facilities"], ['name'=>"Edit"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.facilities.edit', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('facility',$data);

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
        // dd($request->all(),Facilities::find($id)->image);
        $facilities = Facilities::find($id);
        $currentImage = $facilities->image;
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads/facility/'.date('Y').'/'.date('M'),Str::uuid().$imageName, 'public');
            $facilities->image = $path;
            if ($currentImage != "") {
                //delete the current image
                Storage::disk('public')->delete($currentImage);

            }
        }
        $facilities->name = $request->name;
        $facilities->description = $request->description;

        try {
            $facilities->save();
            if ($facilities) {
                return redirect()->route('admin_facilities')->with  ('success','Facility Updated Successfully');


            }else{
                return redirect()->route('admin_facilities')->with('error','Facility Updation failed');

            }
        } catch (\Throwable $th) {
            return redirect()->route('admin_facilities')->with('error','Facility Updation failed');
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
            $facility = Facilities::find($request->id);
            $imagePath = $facility->image;
            if ($imagePath) {
               $delete = $this->removeImage($imagePath);
            }
            $facility = Facilities::destroy($request->id);
            $return_data = array("success"=>true, "message"=>"Facility Deleted Successfully");
        } catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success"=>false, "message"=>"Facility Deletion Failed",'error'=> $th);
        }
        return json_encode($return_data);
    }

    public function toggleStatus(Request $request)
    {
        $id = $request->id;
        $facility = Facilities::find($id);
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
