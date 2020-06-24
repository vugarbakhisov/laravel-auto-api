<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload_form(UploadRequest $request){
        $file = $request->file('images');
        $file_name = $file->getClientOriginalName();
        if ($file->move(public_path('/uploads/'),$file_name)){
            $fil_url = url('/uploads/'. $file_name);
            return response()->json(['url' => $file_name]);
        }
    }
}
