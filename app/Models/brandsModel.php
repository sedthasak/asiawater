<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandsModel extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'title',
        'feature',
        'excerpt',
        'content',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'sort_no'
    ];
}
