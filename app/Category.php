<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function product(){
        return $this->hasMany('App\Product');
    }
}
