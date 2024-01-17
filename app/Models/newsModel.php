<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsModel extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'feature',
        'excerpt',
        'content',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_keyword'
    ];
}
