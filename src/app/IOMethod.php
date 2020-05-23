<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IOMethod extends Model
{
    //
    protected $fillable = ['title', 'description'];
    protected $table = 'iomethods';
}
