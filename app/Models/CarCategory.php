<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];

    public function modelCar():BelongsToMany{
        return $this->belongsToMany(CarModel::class,'mediator_car_model_categories',
            'category_car_id','id');
    }
}
