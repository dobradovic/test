<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
      protected $fillable = [
        'name', 'price', 'quantity'
    ];
}
