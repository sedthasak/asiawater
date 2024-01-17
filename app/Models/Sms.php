<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    //
    protected $table = 'smsreceived';
    // protected $primaryKey = 'position_id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = [
        'messages',
    ];
}