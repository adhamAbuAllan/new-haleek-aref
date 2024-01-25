<?php

namespace App\Http\Controllers;

use App\Http\Resources\MediatorCompanyCategoryResource;
use App\Models\MediatorCompanyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MediatorCompanyCategoryController extends Controller
{
    public function insert(Request $request): \Illuminate\Http\JsonResponse
    {
        $fields = [
            'company_id' => 'required|exists:companies,id',
            'categories_company' => 'required|array',
            'categories_company.*' => 'exists:category_companies,id',
        ];

        $validator = Validator::make($request->all(), $fields);

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return $this->fail($msg);
        }

        $company_id = $request->input('company_id');
        $category_company_ids = $request->input('categories_company');

        $data = [];

        foreach ($category_company_ids as $category_company_id) {
            $mediatorCompanyCategory = MediatorCompanyCategory::create([
                'company_id' => $company_id,
                'category_company_id' => $category_company_id,
            ]);

            $data[] = $mediatorCompanyCategory;
        }

        return $this->success(new MediatorCompanyCategoryResource($data));
    }

}
