<?php

namespace App\Http\Controllers;
use App\Http\Resources\PhotoResouce;
use App\Models\Photo;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function addImages(Request $request)
    {
        $fields = [
            'car_model_id' => 'required|exists:car_models,id',
            'images.*' => 'required|image',
        ];

        $validator = Validator::make($request->all(), $fields);

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return $this->fail($msg);
        }


        $uploadedImages = [];

        $images = $request->file('images');

        if (!is_array($images)) {
            return $this->fail('Images must be an array.');
        }
        $modelId = $request->input('car_model_id');

        foreach ($images as $image) {
            $imageName = 'img_' . rand(1, 150000) . '.png';
//            'img_'.date('Ymdhis').'.'.$image->extension();
            $dir = "images/models_images";
            $image->move(public_path($dir), $imageName);
            $path = $dir . '/'
                .
                $imageName;
//            $quitUrl = 'http://127.0.0.1:8000/' . $path;
            $quitUrl = url($path);

            $data = Photo::create([
                'url' => $quitUrl,
                'car_model_id' => $modelId,
            ]);

            $uploadedImages[] = new PhotoResouce($data);
        }

        return $this->success($uploadedImages);
    }


}
