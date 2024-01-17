<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_modelsModel extends Model
{
    use HasFactory;

    protected $table = 'sub_models';

    protected $fillable = [
        'generations_id',
        'sub_models',
        'description',
        'feature'
    ];
}
