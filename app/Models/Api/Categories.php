<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{



    public function product(){

        return $this->belongsToMany('App\Models\Api\Products','product_categories');

    }
}
