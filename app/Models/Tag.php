<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false; //to remove timestamps in db table

    protected $fillable =  [
        'name',
    ];

    //public function posts() {
    //    return $this->belongsToMany('App/Models/Post');
    //}

    public function posts() {
        return $this->belongsToMany('App\Models\Post');
    }
}
