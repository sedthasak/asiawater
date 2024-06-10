<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsModel extends Model
{
    use HasFactory;

    protected $table = 'options';

    protected $fillable = [
        'option_key',
        'option_value',
        'setting',
    ];
}
