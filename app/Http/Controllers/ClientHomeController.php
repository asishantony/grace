<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolDetails;
use App\Models\NewsEvents;
use App\Models\Programmes;
use App\Models\Academics;
use App\Models\Album;
use Carbon\Carbon;

class ClientHomeController extends Controller
{
    public function view($page)
    {
        $titles = [
            'about'            => 'About Us',
            'vision'           => 'Our Vision',
            'mission'          => 'Our Mission',
            'achievements'     => 'Achievements',
            'rules'            => 'Rules and Regulations',
            'responsibility'   => 'Social Responsibility',
            'accreditation'    => 'Accreditation',
            "chairman_message" => "Chairman's Message"
            ];
        $content = SchoolDetails::get($page)->first();
        $data = [
            'content' => $content[$page],
            'title'   => $titles[$page]
    ];
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
        $academics = Academics::select('id', 'name')->where('status',1)->take(3)->get();
        $albums = Album::with('images')
                        ->select('id', 'name')
                        ->where('featured',1)
                        ->where('status',1)
                        ->has('images')
                        ->get();
        // dd($albums->toArray());
        return view('client.index',$data)
                ->with('news',$news)
                ->with('academics',$academics)
                ->with('albums',$albums);
    }
    public function programmes()
    {
        $programmes = Programmes::where('status',1)->get();
        return view('client.pages.programmes')->with('programmes',$programmes);
    }
    public function showProgram($id)
    {
        $program = Programmes::find($id);
        return view('client.pages.program_show')->with('program',$program);
    }
    public function showAcademic($id)
    {
        $academic = Academics::find($id);
        $academics = Academics::select('id', 'name')->where('status',1)->get();
        return view('client.pages.academic_show')->with('academic',$academic)->with('academics',$academics);
    }
}
