<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logsModel extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $fillable = [
        'part',
        'log_user',
        'event',
        'remark',
        'ref'
    ];


}
