<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class NewsEvents extends Model
{
    use HasFactory;

    public function getDueDateAttribute($value)
    {
       return Carbon::createFromFormat('Y-m-d',$value)->format('d-M-Y');
    }
}
