<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public function getUser(){
        return $this->belongsTo('App\User','user_id');
    }}
