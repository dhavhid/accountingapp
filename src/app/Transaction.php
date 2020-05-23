<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'transdate',
        'amount',
        'category_id',
        'iomethod_id',
        'description',
        'user_id'
    ];
}
