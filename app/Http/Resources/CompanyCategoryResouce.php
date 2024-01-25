<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyCategoryResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
//            'model_id'=>$this->model_id,
            'name'=>$this->name,
            'info'=>$this->info,
//            'cars models'=>$this->modelCar,
            'cars models'=>CarModelResouce::collection($this->modelCar),
//                        'car model'=>ModelResource::collection($this->model)
        ];
    }
}
