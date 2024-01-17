<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticeModel extends Model
{
    use HasFactory;

    protected $table = 'notice';

    protected $fillable = [
        'customer_id',
        'status',
        'title',
        'detail',
        'resource',
        'resource_id',
    ];
}
