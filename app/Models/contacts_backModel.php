<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts_backModel extends Model
{
    use HasFactory;

    protected $table = 'contacts_back';

    protected $fillable = [
        'customer_id',
        'name',
        'tel',
        'time',
        'remark',
        'cars_id',
        'status'
    ];

}
