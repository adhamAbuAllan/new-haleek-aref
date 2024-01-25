<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResouce;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function get_company_info($id)
    {
        return Company::where(['id' => $id])->
        with('categoryCompany')->
        get()->first();
    }

    public function add(Request $request)
    {
        $fields = [
            'name' => 'required',
            'info' => 'required',
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
        $name = $request->name;
        $info = $request->info;
        $data = Company::create([
            'name' => $name,
            'info' => $info,


        ]);
        return $this->success(new CompanyResouce($data));
    }

    public function all(Request $request)
    {

        $companies = Company::all()->reverse();

        $companiesRes = CompanyResouce::collection($companies);

        return $this->success($companiesRes);
    }

    public function one(Request $request)
    {
        $fields = ["id" => "required|exists:companies,id"];
        $valid = Validator::make($request->all(), $fields);
        if ($valid->fails()) {
            return $this->fail($valid->messages()->first());
        }
        $id = $request->id;
        $company = $this->get_company_info($id);
        $companyResource = new CompanyResouce($company);
        return $this->success($companyResource);
    }


}
