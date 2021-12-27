<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class myOrder extends Model
{
    protected $fillable=['paymentStatus','userID','amount'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function myCart(){
        return $this->hasMany('App\myCart'); 
    }
}
