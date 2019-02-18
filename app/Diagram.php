<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagram extends Model
{
    // Testing with current date : to be replaced with Carbon::today()
    public const DEFAULT_DATE = '2018_12_19';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'latitude', 'longitude', 'filename', 'date'
    ];

    /*private function convertDashToGround(string $date)
    {
        return str_replace('-', '_', $date);
    }

    private function convertGroundToDash(string $date)
    {
        return str_replace('_', '-', $date);
    }*/

}
