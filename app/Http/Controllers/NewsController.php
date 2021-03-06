<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsEvents;
use App\Http\Requests\NewsCreateRequest;
use File;
use Storage;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_data = NewsEvents::orderBy('due_date',"desc")->get();
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"], ['name'=>"News & Events"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.news.news', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('news_data',$news_data);
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
    public function store(NewsCreateRequest $request)
    {
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads/news/'.date('Y').'/'.date('M'),Str::uuid().$imageName, 'public');
        }
        $news = new NewsEvents;
        $news->heading = $request->heading;
        $news->content = $request->content;
        $news->due_date= $request->due_date;
        $news->image = $path;
        $news->priority = NewsEvents::max('priority')+1;
        try {
            $news->save();
            if ($news) {
                $return_data = array("success"=>true, "message"=>"News Added Successfully");

            }else{
                $return_data = array("success"=>false, "message"=>"News Addition Failed");

            }
        } catch (\Throwable $th) {
            $return_data = array("success"=>false, "message"=>"News Addition Failed");
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
        try {
            $data = NewsEvents::find($id);
            // dd($data);
            if ($data->count() > 0) {
                // dd($data->toArray());
                $html = view('pages.news.show')->with('news',$data)->render();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = NewsEvents::find($id);
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"],['link' => "/admin/news", 'name' => "News"], ['name'=>"Edit"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.news.edit', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('news',$data);
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

        // dd($request->all());
        $news = NewsEvents::find($id);
        $currentImage = $news->image;
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads/news/'.date('Y').'/'.date('M'),Str::uuid().$imageName, 'public');
            $news->image = $path;
            if ($currentImage != "") {
                //delete the current image
                Storage::disk('public')->delete($currentImage);

            }
        }
        $news->heading = $request->heading;
        $news->content = $request->content;
        $news->due_date= $request->due_date;
        try {
            $news->save();
            if ($news) {
                return redirect()->route('admin_news')->with  ('success','News Updated Successfully');


            }else{
                return redirect()->route('admin_news')->with('error','News Updation failed');

            }
        } catch (\Throwable $th) {
            return redirect()->route('admin_news')->with('error','News Updation failed');
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
        // dd($request->id);
        try {
            //delelte the image related to the news
            $news_data = NewsEvents::find($request->id);
            $imagePath = $news_data->image;
            if ($imagePath) {
            //    dd($imagePath);
               $delete = Storage::disk('public')->delete($imagePath);

            }
            $news_data = NewsEvents::destroy($request->id);
            $return_data = array("success"=>true, "message"=>"News Deleted Successfully");
        } catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success"=>false, "message"=>"News Deletion Failed",'error'=> $th);
        }
        return json_encode($return_data);
    }

    //Change featured functionality
    public function toggleFeatured(Request $request)
    {
        $id = $request->id;
        $news_data = NewsEvents::find($id);
        if ($news_data->featured) {
            $news_data->featured = 0;
        }else {
            $news_data->featured = 1;
        }
        try {
            $news_data->save();
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
        $news_data = NewsEvents::find($id);
        if ($news_data->status) {
            $news_data->status = 0;
        }else {
            $news_data->status = 1;
        }
        try {
            $news_data->save();
            $return_data = array("success"=>true, "message"=>"Status Changed Successfully");

        } catch (\Throwable $th) {
            $return_data = array("success"=>true, "message"=>"Status Changing Failed");

        }
        return json_encode($return_data);

    }
    //change priority functionality

    // Update and delete functionality
}
