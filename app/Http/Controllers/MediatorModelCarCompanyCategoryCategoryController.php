<?php

namespace App\Http\Controllers;

use App\Http\Resources\MediatorModelCarCompanyCategoryResource;
use App\Models\MediatorModelCarCompanyCategoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use MediatorModelCarCompanyCategory;

class MediatorModelCarCompanyCategoryCategoryController extends Controller
{
    public function insert(Request $request): \Illuminate\Http\JsonResponse
    {
        $fields = [
            'category_company_id' => 'required|exists:category_companies,id',
            'models_cars' => 'required|array',
            'models_cars.*' => 'exists:car_models,id',
        ];

        $validator = Validator::make($request->all(), $fields);

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return $this->fail($msg);
        }

        $category_company_id = $request->input('category_company_id');
        $model_car_ids = $request->input('models_cars');

        $data = [];

        foreach ($model_car_ids as $model_car_id) {
            $mediatorModelCarCompanyCategory = MediatorModelCarCompanyCategoryCategory::create([
                'category_company_id' => $category_company_id,
                'model_car_id' => $model_car_id,
            ]);

            $data[] = $mediatorModelCarCompanyCategory;
        }

        return $this->success(new MediatorModelCarCompanyCategoryResource($data));
    }

}
