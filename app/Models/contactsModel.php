<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactsModel extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'customer_id',
        'name',
        'tel',
        'line',
        'messages'
    ];
}
