<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MediatorModelCarCompanyCategoryCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_company_id',
        'model_car_id',
    ];
    public function categoryCompany():BelongsTo{
        return $this->belongsTo(\CategoryCompnay::class);
    }
    public function model():BelongsTo{
        return $this->belongsTo(CarModel::class);
    }
}
