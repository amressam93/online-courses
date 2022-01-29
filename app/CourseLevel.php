<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    protected $fillable = [
        'name',
    ];


    public function courses()
    {
        return $this->hasMany('App\course','level_id');
    }


}
