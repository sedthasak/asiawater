<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generationsModel extends Model
{
    use HasFactory;

    protected $table = 'generations';

    protected $fillable = [
        'models_id',
        'generations',
        'yearfirst',
        'yearlast',
        'description',
        'feature'
    ];
}
