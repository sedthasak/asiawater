<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setFooterModel extends Model
{
    use HasFactory;

    protected $table = 'footer_setting';

    protected $fillable = [
        'page',
        'footer_name',
        'footer_link',
        'heading',
        'name',
        'link', 
    ];
}
