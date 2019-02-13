<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'start_date',
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

}
