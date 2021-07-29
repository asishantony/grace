<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolDetails;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SchoolDetails::get()->first()->toArray();
        // dd($data);
        $breadcrumbs = [
             ['link' => "javascript:void(0)", 'name' => "Administration"], ['name' => "Account Settings"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];

        return view('pages.site_settings', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs])->with('site_data',$data);
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
    public function updateInfo(Request $request, $id)
    {
        // dd($request->toArray());
        $settings = SchoolDetails::find($id);
        $settings->vision = $request->vision;
        $settings->mission = $request->mission;
        $settings->about = $request->about;
        $settings->rules = $request->rules;
        $settings->responsibility = $request->responsibility;
        $settings->accreditation = $request->accreditation;
        $settings->chairman_message = $request->chairman_message;
        $settings->principal_message = $request->principal_message;
        $settings->patron_message = $request->patron_message;
        $settings->save();
        if($settings)
        {
            $return_data = array("success"=>true, "message"=>"Site Settings Updated Successfully");
        }else {
            $return_data = array("success"=>false, "message"=>"Site Settings Updation failed");

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
    public function updateSocial(Request $request, $id)
    {
        // dd($request->toArray());
        $settings = SchoolDetails::find($id);
        $settings->twitter = $request->twitter;
        $settings->facebook = $request->facebook;
        $settings->linkedin = $request->linkedin;
        $settings->instagram = $request->instagram;
        $settings->skype = $request->skype;
        // $settings->chairman_message = $request->chairman_message;
        try {
            $settings->save();
            if($settings)
            {
                $return_data = array("success"=>true, "message"=>"Site Settings Updated Successfully");
            }else {
                $return_data = array("success"=>false, "message"=>"Site Settings Updation failed");

            }
         } catch (\Throwable $th) {
            $return_data = array("success"=>false, "message"=>"Site Settings Updation failed");
        }

        return json_encode($return_data);
    }
    /**
     * Update the Basic Site Settings in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBasic(Request $request, $id)
    {
        // dd($request->toArray());
        $settings = SchoolDetails::find($id);
        $settings->name = $request->name;
        $settings->email = $request->email;
        $settings->phone1 = $request->phone1;
        $settings->phone2 = $request->phone2;
        $settings->address = $request->address;
        try {
            $settings->save();

            if($settings)
            {
                $return_data = array("success"=>true, "message"=>"Site Settings Updated Successfully");
            }else {
                $return_data = array("success"=>false, "message"=>"Site Settings Updation failed");

            }
        } catch (\Throwable $th) {
            // dd($th);
            $return_data = array("success"=>false, "message"=>"Site Settings Updation failed");
        }
        return json_encode($return_data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
