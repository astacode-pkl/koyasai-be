<?php

namespace App\Http\Controllers;

use App\Jobs\ConvertToWebpJob;


abstract class Controller
{
    public function uploadImage($destination,$image){
        $destinationPath = $destination;
        //sh1 file name
        
        $sha1FileName = sha1($image->getClientOriginalName());
        $imageMimeType = $image->getMimeType();

        if (strpos($imageMimeType, 'image/') === 0) {
            $imageName = date('YmdHis') . '' . str_replace(' ', '', $sha1FileName);
            $image->move($destinationPath, $imageName);
            
            dispatch(new ConvertToWebpJob($destinationPath, $imageName, $imageMimeType));

            return pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
        }

        return '';

    }
    
    public function destroyImage($destination,$data){
        $destinationPath = $destination;
        if ($data && file_exists(
            public_path($destinationPath . $data)
        )) {

            unlink(public_path($destinationPath . $data));
        }
    }

    
    public function updateImage($destination,$data,$image){
         $destinationPath = $destination;
            if ($image && file_exists(
                public_path($destinationPath . $data)
            )) {

                @unlink(public_path($destinationPath . $data));
            }else if (!$image && file_exists(
                public_path($destinationPath . $data)
            )){

                return $data;
            }
            
            //sh1 file name
            $sha1FileName = sha1($image->getClientOriginalName());

            $imageMimeType = $image->getMimeType();

            if (strpos($imageMimeType, 'image/') === 0) {
                $imageName = date('YmdHis') . '' . str_replace(' ', '', $sha1FileName);
                $image->move($destinationPath, $imageName);

                    dispatch(new ConvertToWebpJob($destinationPath, $imageName, $imageMimeType));


                    return  pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
                
            }
    }
}
