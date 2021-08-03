<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'title',
        'status'
    ];



    public function photo()
    {
        return $this->morphOne('App\photo','photoable');
    }



    public function users()
    {
        return $this->belongsToMany('App\User');
    }


    public function quizzes()
    {
        return $this->hasMany('App\Quiz');
    }



    public function track()
    {
        return $this->belongsTo('App\track');
    }


    public function videos()
    {
        return $this->hasMany('App\video');
    }





}
