<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Album;
use Storage;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery_images = Image::with('albums:id,name')->get()->toArray();
        $albums = Album::select('id','name')->orderBy('name')->get();
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Gallery"], ['name'=>"Image"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.gallery.index', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('gallery_images',$gallery_images)->with('albums',$albums);
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
        return($request->file('image'));
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads/gallery/'.date('Y').'/'.date('M'), $imageName, 'public');
        }
        $gallery = new Image;
        $gallery->name = $request->name;
        $gallery->album_id = $request->album_id;
        $gallery->description = $request->description;
        $gallery->status = 1;
        $gallery->featured = 1;
        $gallery->url = $path;
        try {
            $gallery->save();
            if ($gallery) {
                $return_data = array("success"=>true, "message"=>"Image Added Successfully");

            }else{
                $this->removeImage('/storage/'.$path);
                $return_data = array("success"=>false, "message"=>"Image Addition Failed");

            }
        } catch (\Throwable $th) {
            dd($th);
            $this->removeImage('/storage/'.$path);
            $return_data = array("success"=>false, "message"=>"Image Addition Failed");
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
    public function destroy(Request $request)
    {
        //
        try {
        $image = Image::find($request->id);
        $this->removeImage($image->url);
        $deleteStatus = Image::destroy($request->id);
        $return_data = array("success"=>true, "message"=>"Image Deleted Successfully");

        }
        catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success"=>false, "message"=>"Image Deletion Failed",'error'=> $th);
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
