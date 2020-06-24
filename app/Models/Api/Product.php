<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    public function categories(){

       return $this->belongsToMany('App\Models\Api\Categories','product_categories');

    }

}
