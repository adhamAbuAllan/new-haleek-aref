<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
//        'model_id',
        'name',
        'info',
    ];
//    public function model():BelongsToMany{
//        return $this->belongsToMany(CarModel::class);
//    }
public function modelCar():BelongsToMany{
    return $this->belongsToMany(CarModel::class,
        'mediator_model_car_company_categories','category_company_id','id');
}
    public function company():BelongsToMany{
        return $this->belongsToMany(Company::class,'mediator_company_category',
            'category_car_id','id')
    ;}
}
