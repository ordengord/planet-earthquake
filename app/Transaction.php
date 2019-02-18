<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'start_date',
        'end_date'
    ];

    public function order()
    {
        return $this->hasMany('App\Order');
    }

}
