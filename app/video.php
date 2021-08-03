<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable = [
        'title',
        'link',
    ];




    public function course()
    {
        return $this->belongsTo('App\course');
    }


}
