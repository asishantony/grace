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
        $albums = Album::select('id', 'name')->orderBy('name')->get();
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Gallery"], ['name' => "Image"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.gallery.index', ['pageConfigs' => $pageConfigs], [
            'breadcrumbs' => $breadcrumbs
        ])->with('gallery_images', $gallery_images)->with('albums', $albums);
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
        $files = [];

        $sucess_count = 0;
        $failed_count = 0;
        if ($request->file('image')) {
            foreach ($request->file('image') as $image) {
                $imagePath = $image;
                $imageName = $imagePath->getClientOriginalName();
                $imageName = time() . '_' . $imageName;
                $path = $image->storeAs('uploads/gallery/' . date('Y') . '/' . date('M'), $imageName, 'public');
                $files[] = $path;
            }

            // if ($request->file('image')) {
            //     $imagePath = $request->file('image');
            //     $imageName = $imagePath->getClientOriginalName();

            //     $path = $request->file('image')->storeAs('uploads/gallery/'.date('Y').'/'.date('M'), $imageName, 'public');
            // }
            foreach ($files as $path) {
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

                        $sucess_count = $sucess_count + 1;
                    } else {
                        $this->removeImage('/storage/' . $path);
                        $failed_count = $failed_count + 1;
                    }
                } catch (\Throwable $th) {
                    $this->removeImage('/storage/' . $path);
                    $failed_count = $failed_count + 1;
                }
            }
            if ($sucess_count == count($files)) {
                $return_data = array("success" => true, "message" => "All Images Uploaded Successfully");
            } else if ($sucess_count > 0 && $failed_count > 0) {
                $return_data = array("success" => true, "message" => "Some Images Uploaded Successfully and Some Failed");
            } else {
                $return_data = array("success" => false, "message" => "All Images Upload Failed");
            }
            return json_encode($return_data);
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
            $return_data = array("success" => true, "message" => "Image Deleted Successfully");
        } catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success" => false, "message" => "Image Deletion Failed", 'error' => $th);
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
