<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolDetails;

class ClientHomeController extends Controller
{
    public function view($page)
    {
        // dd($page);
        $titles = array('about'=>'About Us','vision'=>'Our Vision','mission'=>'Our Mission','achievement'=>'Achievements',
                        'rules'=>'Rules and Regulations','responsibility'=>'Social Responsibility',
                        'accreditation'=>'Accreditation',"chairman_message"=>"Chairman's Message");
        $content = SchoolDetails::get($page)->first();
        $data = array('content' => $content[$page] , 'title' =>$titles[$page]);
        return view('client.pages.about',$data);
    }
    public function home()
    {
        $data = SchoolDetails::get()->first()->toArray();
       
        return view('client.index',$data);
    }
    public function create()
    {
        
    }
}
