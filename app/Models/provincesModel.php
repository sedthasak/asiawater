<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provincesModel extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    protected $fillable = [
        'code',
        'name_th',
        'name_en',
        'geography_id'
    ];

}
