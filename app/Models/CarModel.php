<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
//        'car_category_id',
        'name',
    ];
    public function carCategory():BelongsToMany{
        return $this->belongsToMany(CarCategory::class,
            'mediator_car_model_categories','model_car_id','id');
    }
    public function modelCarCategoryCompany():BelongsToMany{
        return $this->belongsToMany(CategoryCompany::class,
            'mediator_model_car_company_categories','model_car_id','id');
    }

    public function CategoryCompany():BelongsTo{
        return $this->belongsTo(CategoryCompany::class,);

    }

    public function photos():HasMany{
        return $this->hasMany(Photo::class,);
    }
}
