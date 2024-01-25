<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyCategoryResouce;
use App\Models\CategoryCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryCompanyController extends Controller
{
    public function add(Request $request){
        $fields = [
//            'company_id'=>'required|exists:companies,id',
            'name'=>'required',
            'info'=>'required',
        ];
        $validator = Validator::make($request->all(), $fields);
        $valid = $validator;
        if ($valid->fails()) {
            $msg = $valid->messages()->first();
            $res = [
                'status' => false,
                'msg' => $msg,
                'data' => null
            ];

            return response()->json($res, 404);
        }
//        $company_id = $request->category_company_id;
        $name = $request->name;
        $info = $request->info;
        $data = CategoryCompany::create([
//            'company_id'=>$company_id,
            'name'=>$name,
            'info'=>$info,


        ]);
        return $this->success(new CompanyCategoryResouce($data));
    }
    public function all(Request $request)
    {

        $CompanyCategories =  CategoryCompany::all()->reverse();

        $CategoriesCompaniesRes = CompanyCategoryResouce::collection($CompanyCategories);

        return $this->success($CategoriesCompaniesRes);
    }


}
