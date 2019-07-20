<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class timeandlocation extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'checkIn', 'checkOut','lat1','lon1'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
