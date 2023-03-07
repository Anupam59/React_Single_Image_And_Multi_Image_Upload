<?php

namespace App\Http\Controllers;

use App\Models\MultImageModel;
use App\Models\PostImageModel;
use Illuminate\Http\Request;
use function Nette\Utils\insert;

class PostImageController extends Controller
{
    public function PostAdd(Request $request){
        $data = array();
        $data['post_name'] = $request->input('post_name');
        $post_image =  $request->file('post_image');
        if ($post_image){
            $ImageName =time().'.'.$post_image->getClientOriginalExtension();
            $logo_path = "Images/";
            $post_image->move($logo_path, $ImageName);
            $data['post_image'] = $ImageName;
        }

        $result = PostImageModel::insert($data);
        return $result;

    }

    public function PostMoreImage(Request $request){

        $more_images =  $request->file('mult_image');
        $index = 0;
        foreach($more_images as $image){
            $ImageName =time().$index.'.'.$image->getClientOriginalExtension();
            $proImg_path = "ImagesMult/";
            $image->move($proImg_path, $ImageName);

            MultImageModel::insert([
                'mult_image' => $ImageName,
            ]);
            $index++;
        }

    }
}
