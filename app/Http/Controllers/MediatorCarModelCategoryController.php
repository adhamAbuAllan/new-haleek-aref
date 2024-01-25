<?php

namespace App\Http\Controllers;

use App\Http\Resources\MediatorCarModelCategoryResource;
use App\Models\MediatorCarModelCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MediatorCarModelCategoryController extends Controller
{
    public function insert(Request $request): \Illuminate\Http\JsonResponse
    {
        $fields = [
            'model_car_id' => 'required|exists:car_models,id',
            'categories_cars' => 'required|array',
            'categories_cars.*' => 'exists:car_categories,id',
        ];

        $validator = Validator::make($request->all(), $fields);

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return $this->fail($msg);
        }

        $model_car_id = $request->input('model_car_id');
        $categories_cars_ids = $request->input('categories_cars');

        $data = [];

        foreach ($categories_cars_ids as $category_car_id) {
            $mediatorCarModelCategory = MediatorCarModelCategory::create([
                'model_car_id' => $model_car_id,
                'category_car_id' => $category_car_id,
            ]);

            $data[] = $mediatorCarModelCategory;
        }

        return $this->success(new MediatorCarModelCategoryResource($data));
    }

}
