<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms_session extends Model
{
    //
    protected $table = 'sms_session';
    // protected $primaryKey = 'position_id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = [
        'customer_id',
        'customer_session',
        'browserFingerprint',
        'messages'
    ];
}