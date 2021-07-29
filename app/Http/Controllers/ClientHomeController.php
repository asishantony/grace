<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolDetails;
use App\Models\NewsEvents;
use App\Models\Programmes;
use App\Models\Academics;
use App\Models\Album;
use App\Models\Facilities;
use Carbon\Carbon;

class ClientHomeController extends Controller
{
    public function view($page)
    {
        $school_data = SchoolDetails::get()->first()->toArray();
        $titles = [
            'about'             => 'About Us',
            'vision'            => 'Our Vision',
            'mission'           => 'Our Mission',
            'achievements'      => 'Achievements',
            'rules'             => 'Rules and Regulations',
            'responsibility'    => 'Social Responsibility',
            'accreditation'     => 'Accreditation',
            "chairman_message"  => "Chairman's Message",
            "principal_message" => "Principal's Message",
            "patron_message"    => "Patron's Message"
            ];
        $content = SchoolDetails::get($page)->first();
        $page_data = [
            'content' => $content[$page],
            'title'   => $titles[$page]
    ];
       $data =  array_merge($page_data,$school_data);

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
        $academics = Academics::select('id', 'name')->where('status',1)->get();
        $albums = Album::with('images')
                        ->select('id', 'name')
                        ->where('featured',1)
                        ->where('status',1)
                        ->has('images')
                        ->take(3)
                        ->get();
        $facilities = Facilities::where('status',1)->get();
        // $menuCheck =['gallery'=>count($albums)>0,'news' => count($news)>0,'academics'=>count($academics)>0,'facilities'=>count($facilities)>0];
        // dd(count($albums),count($news),count($academics),$menuCheck);
        return view('client.index',$data)
                ->with('news',$news)
                ->with('academics',$academics)
                ->with('facilities',$facilities)
                ->with('albums',$albums);
    }
    public function programmes()
    {
        $school_data = SchoolDetails::get()->first()->toArray();

        $programmes = Programmes::where('status',1)->get();
        return view('client.pages.programmes',$school_data)->with('programmes',$programmes);
    }
    public function showProgram($id)
    {
        $school_data = SchoolDetails::get()->first()->toArray();
        $program = Programmes::find($id);
        return view('client.pages.program_show',$school_data)->with('program',$program);
    }
    public function showAcademic($id)
    {
        $school_data = SchoolDetails::get()->first()->toArray();
        $academic = Academics::find($id);
        $academics = Academics::select('id', 'name')->where('status',1)->get();
        return view('client.pages.academic_show',$school_data)->with('academic',$academic)->with('academics',$academics);
    }
    public function showMessage($messageType)
    {
        $school_data = SchoolDetails::get()
                                    ->first()
                                    ->toArray();

        $messages = [
            'chairman' => [
                'message' => $school_data['chairman_message'],
                'title'   => "Chairman's Message",
                'name'   => "Fr. Clarence Paliath",
                'image'   => asset('images/client/team/clarance.png')
            ],
            'patron' => [
                'message' => $school_data['patron_message'],
                'title'   => "Patron's Message",
                'name'   => "Rev.Dr. Alex Vadakkumthala",
                'image'   => asset('images/client/team/bishop.png')
            ],
            'principal' => [
                'message' => $school_data['principal_message'],
                'title'   => "Principal's Message",
                'name'   => "Ms. Ruth del Val Sanchez",
                'image'   => asset('images/client/team/ruth.png'),
            ],

        ];
        return view('client.pages.message',$school_data)->with('data',$messages[$messageType]);
    }
}
