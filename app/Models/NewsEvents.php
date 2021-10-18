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
     /**
     * Set the due date attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = Carbon::parse($value)->format('Y-m-d');
    }
}
