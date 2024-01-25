<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'info'=>$this->info,

//            'categories company'=>$this->categoryCompany
            'categories company'=>CompanyCategoryResouce::collection($this->categoryCompany)
        ////                        'car model'=>ModelResource::collection($this->model)
        ];
    }
}
