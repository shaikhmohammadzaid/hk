<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class Emp_task_image extends Model
{
     public static function photo($request,$fileName,$default="")
    {
        $name ="";
        $photo= $request->photo;
          
        if ($request->hasFile($fileName)) 
        {
          
            $extension=$photo->getClientOriginalExtension();
            $name=rand(11111,99999).".".date('y-m-d').".".time().".".$extension;
          
            Storage::disk('emp_task_image')->put($name,File::get($photo));
        }
        else{
            $name=$default;
        }
        return $name;
    }
}
