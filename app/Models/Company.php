<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'info',
    ];
    public function categoryCompany():BelongsToMany{
        return $this->belongsToMany(CategoryCompany::class,
            'mediator_company_category','company_id','id');
    }

}
