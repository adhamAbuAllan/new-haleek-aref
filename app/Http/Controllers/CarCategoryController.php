<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarCategoryResouce;
use App\Models\CarCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarCategoryController extends Controller
{
    public function add(Request $request){
        $fields = [
            'name'=>'required',
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
        $data = CarCategory::create([
            'name'=>$name,


        ]);
        return $this->success(new CarCategoryResouce($data));
    }
    public function all(Request $request)
    {

        $carsCategories =  CarCategory::all()->reverse();

        $carsCategoriesRes = CarCategoryResouce::collection($carsCategories);

        return $this->success($carsCategoriesRes);
    }

}
