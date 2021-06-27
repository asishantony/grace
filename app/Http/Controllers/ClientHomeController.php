<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolDetails;
use App\Models\NewsEvents;
use Carbon\Carbon;

class ClientHomeController extends Controller
{
    public function view($page)
    {
        // dd($page);
        $titles = array('about'=>'About Us','vision'=>'Our Vision','mission'=>'Our Mission','achievements'=>'Achievements',
                        'rules'=>'Rules and Regulations','responsibility'=>'Social Responsibility',
                        'accreditation'=>'Accreditation',"chairman_message"=>"Chairman's Message");
        $content = SchoolDetails::get($page)->first();
        $data = array('content' => $content[$page] , 'title' =>$titles[$page]);
        return view('client.pages.about',$data);
    }
    public function home()
    {
        $data = SchoolDetails::get()->first()->toArray();
        $news= NewsEvents::orderBy('due_date','desc')
                            ->where('featured',1)
                            ->where('status',1)
                            ->where('due_date','>',Carbon::now()->format('Y-m-d'))
                            ->get();
        // dd($news->toArray());
        // $news = array();
       
        return view('client.index',$data)->with('news',$news);
    }
    public function create()
    {
        
    }
}
