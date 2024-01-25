<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'url',
        'car_model_id',
    ];
    public function carModel():BelongsTo{
        return $this->belongsTo(CarModel::class);
    }
}
