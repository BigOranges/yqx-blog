<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    
    public function createimg(Request $request){

    	$file = $request->file('pic');

        $allowed_extensions = ["png", "jpg", "gif"];

         if ($file->getClientOriginalExtension() && in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            
            $destinationPath = 'upload/'; //public 文件夹下面建 /uploads 文件夹
            $extension = $file->getClientOriginalExtension(); //获取后缀名
            $fileName = str_random(10).'.'.$extension; //新的文件名

            $file->move($destinationPath,$fileName);   //移动

            $filePath = asset($destinationPath.$fileName);
            
            return $filePath;

        }else{

            return back();

        }
    }
}
