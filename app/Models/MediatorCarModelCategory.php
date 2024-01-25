<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MediatorCarModelCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'model_car_id',
        'category_car_id',
    ];
    public function modelCar():BelongsTo{
        return $this->belongsTo(\CarModel::class);
    }
    public function categoryCarModel():BelongsTo{
        return $this->belongsTo(CarCategory::class);
    }
}
