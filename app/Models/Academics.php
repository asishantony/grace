<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewsEvents;
use App\Models\Album;
use Carbon\Carbon;
class Academics extends Model
{
    use HasFactory;
    public function getMenu()
    {
        return $this->select('id', 'name')->where('status',1)->get();
    }
    public function menuCheck()
    {
    $news= NewsEvents::orderBy('due_date','desc')
        ->where('featured',1)
        ->where('status',1)
        ->where('due_date','>',Carbon::now()->format('Y-m-d'))
        ->count();
    $academics = $this->select('id', 'name')->where('status',1)->count();
    $albums = Album::with('images')
        ->select('id', 'name')
        ->where('featured',1)
        ->where('status',1)
        ->has('images')
        ->take(3)
        ->count();
        return ['gallery'=>$albums,'news' => $news,'academics'=>$academics];
    }
}
