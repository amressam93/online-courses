<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name',
        'course_id'
    ];




    public function course()
    {
        return $this->belongsTo('App\course');
    }



    public function questions()
    {
        return $this->hasMany('App\Question');
    }




    public function users()
    {
        return $this->belongsToMany('App\User');
    }



}
