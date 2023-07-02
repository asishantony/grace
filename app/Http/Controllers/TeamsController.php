<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Storage;
use Illuminate\Support\Str;


class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::orderBy('priority',"asc")->get();
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"], ['name'=>"Team"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.team.index', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('teams',$teams);
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

            $path = $request->file('image')->storeAs('uploads/team/'.date('Y').'/'.date('M'), Str::uuid().$imageName, 'public');
        }
        $teams = new Team;
        $teams->name = $request->name;
        $teams->description = $request->description;
        $teams->image = $path;
        $teams->status = 1;
        $teams->priority = Team::max('priority')+1;
        try {
            $teams->save();
            if ($teams) {
                $return_data = array("success"=>true, "message"=>"Team Added Successfully");

            }else{
                $return_data = array("success"=>false, "message"=>"Team Addition Failed");

            }
        } catch (\Throwable $th) {
            $return_data = array("success"=>false, "message"=>"Team Addition Failed");
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
            $data = Team::find($id);
            // dd($data);
            if ($data->count() > 0) {
                $html = view('pages.team.show')->with('team',$data)->render();
                $return_data = array("success"=>true, 'html'=>$html);

            }else{
                $return_data = array("success"=>false, "message"=>"No Programs Found");

            }
        } catch (\Throwable $th) {
            //throw $th;
            $return_data = array("success"=>false, "message"=>"Error in getting teams data");
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
        $data = Team::find($id);
       $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Administration"],['link' => "/admin/teams", 'name' => "Team"], ['name'=>"Edit"]
        ];
        $pageConfigs = ['pageHeader' => true];

        return view('pages.team.edit', ['pageConfigs' => $pageConfigs],[
            'breadcrumbs' => $breadcrumbs
        ])->with('team',$data);

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
        // dd($request->all(),Team::find($id)->image);
        $teams = Team::find($id);
        $currentImage = $teams->image;
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads/team/'.date('Y').'/'.date('M'),Str::uuid().$imageName, 'public');
            $teams->image = $path;
            if ($currentImage != "") {
                //delete the current image
                Storage::disk('public')->delete($currentImage);

            }
        }
        $teams->name = $request->name;
        $teams->description = $request->description;

        try {
            $teams->save();
            if ($teams) {
                return redirect()->route('admin_teams')->with  ('success','Team Updated Successfully');


            }else{
                return redirect()->route('admin_teams')->with('error','Team Updation failed');

            }
        } catch (\Throwable $th) {
            return redirect()->route('admin_teams')->with('error','Team Updation failed');
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
            $team = Team::find($request->id);
            $imagePath = $team->image;
            if ($imagePath) {
               $delete = $this->removeImage($imagePath);
            }
            $team = Team::destroy($request->id);
            $return_data = array("success"=>true, "message"=>"Team Deleted Successfully");
        } catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success"=>false, "message"=>"Team Deletion Failed",'error'=> $th);
        }
        return json_encode($return_data);
    }

    public function toggleStatus(Request $request)
    {
        $id = $request->id;
        $team = Team::find($id);
        if ($team->status) {
            $team->status = 0;
        }else {
            $team->status = 1;
        }
        try {
            $team->save();
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
