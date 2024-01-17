<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Customer extends Model
{
    //
    protected $table = 'customer';
    // protected $primaryKey = 'position_id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = [
        'phone', 
        'sp_role', 
        'username',
        'email',
        'remember',
        'image',
        'firstname',
        'lastname',
        'place',
        'province',
        'map',
        'google_map',
        'facebook',
        'line',
        'last_action',
        'history'
    ];

    // public function index()
    // {
    //     $Customer = Customer::query()->paginate(4);

    //     if (Input::has('s')){
    //         $Customer->where('phone',Input::get('s'));
    //     }
    // }
}