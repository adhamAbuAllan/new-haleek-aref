<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarModelResouce;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarModelController extends Controller
{
    public function add(Request $request){
        $fields = [
//            'car_category_id'=>'required|exists:car_categories,id',
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
//        $car_category_id = $request->car_category_id;
        $name = $request->name;
        $data = CarModel::create([
//            'car_category_id'=>$car_category_id,
            'name'=>$name,


        ]);
        return $this->success(new CarModelResouce($data));
    }
    public function all(Request $request)
    {

        $carsModels =  CarModel::all()->reverse();

        $carsModelsRes = CarModelResouce::collection($carsModels);

        return $this->success($carsModelsRes);
    }

}
