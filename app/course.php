<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
        'status',
        'link',
        'track_id',
        'level_id'
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


    public function level()
    {
        return $this->belongsTo('App\CourseLevel','level_id');
    }


    public function videos()
    {
        return $this->hasMany('App\video');
    }



    public static function SearchQuery($search)
    {
           $result = course::where(function ($query) use ($search){

            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
            $query->orWhereHas('videos', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        });

           return $result;
    }



}
