<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting_optionModel extends Model
{
    use HasFactory;

    protected $table = 'setting_option';

    protected $fillable = [
        'key_option',
        'value_option',
        'setting',
    ];
}
