<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fund extends Model
{
        protected $fillable = [
        'name', 'amount'
    ];
}
