<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carsModel extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'title',
        'feature',
        'brand_id',
        'model_id',
        'generations_id',
        'sub_models_id',
        'modelyear',
        'vehicle_code',
        'gear',
        'color',
        'price',
        'province',
        'gas',
        'ev',
        'user_id',
        'customer_id',
        'mileage',
        'mappicture',
        'location',
        'clickcount',
        'viewcount',
        'seecount',
        'adddate',
        'approvedate',
        'expiredate',
        'stock',
        'type',
        'promotion_id',
        'status',
        'payment',
        'detail',
        'reserve',
        'licenseplate',
        'warranty_1',
        'warranty_2',
        'warranty_3',
        'warranty_2_input',
        'category',
        'tag',
        'meta_title',
        'meta_description',
        'meta_keyword'
    ];
}
