<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $album_data = Album::with('images')->get();
        // dd($album_data);
        if (!$album_data) {
            abort();
        }
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Gallery"], ['name'=>"Album"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.album.index', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('album_data',$album_data);
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
        $album = new Album;

        $album->name = $request->name;
        try {
            $album->save();
            if ($album) {
                $return_data = array("success"=>true, "message"=>"Album Added Successfully");

            }else{
                $return_data = array("success"=>false, "message"=>"Album Addition Failed");

            }
        } catch (\Throwable $th) {
            dd($th);
            $return_data = array("success"=>false, "message"=>"Album Addition Failed");
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
        try {
            $data = Album::find($id);
            if ($data->count() > 0) {
                $html = view('pages.album.edit')->with('album',$data)->render();
                $return_data = array("success"=>true, 'html'=>$html);

            }else{
                $return_data = array("success"=>false, "message"=>"No News Found");

            }
        } catch (\Throwable $th) {
            //throw $th;
            $return_data = array("success"=>false, "message"=>"Error in getting news data");
        }

        return json_encode($return_data);

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
        $album_data = Album::find($id);
        $album_data->name = $request->name;
        try {
            $album_data->save();
            if ($album_data) {
                $return_data = array("success"=>true, "message"=>"Album Updated Successfully");

            }else{
                $return_data = array("success"=>false, "message"=>"Album Updation Failed");

            }
        } catch (\Throwable $th) {
            $return_data = array("success"=>false, "message"=>"Album Updation Failed");
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
        //
        try{
            $album_data = Album::destroy($request->id);
            $return_data = array("success"=>true, "message"=>"Album Deleted Successfully");
        } catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success"=>false, "message"=>"Album Deletion Failed");
        }
        return json_encode($return_data);

    }
    public function toggleFeatured(Request $request)
    {
        $id = $request->id;
        $album_data = Album::find($id);
        if ($album_data->featured) {
            $album_data->featured = 0;
        }else {
            $album_data->featured = 1;
        }
        try {
            $album_data->save();
            $return_data = array("success"=>true, "message"=>"Featured Flag Changed Successfully");

        } catch (\Throwable $th) {
            $return_data = array("success"=>true, "message"=>"Featured Flag Changing Failed");

        }
        return json_encode($return_data);

    }

    //change active functionality
    public function toggleStatus(Request $request)
    {
        $id = $request->id;
        $album_data = Album::find($id);
        if ($album_data->status) {
            $album_data->status = 0;
        }else {
            $album_data->status = 1;
        }
        try {
            $album_data->save();
            $return_data = array("success"=>true, "message"=>"Status Changed Successfully");

        } catch (\Throwable $th) {
            $return_data = array("success"=>true, "message"=>"Status Changing Failed");

        }
        return json_encode($return_data);

    }
}
