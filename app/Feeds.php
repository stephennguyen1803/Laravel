<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feeds extends Model
{
    protected $table = 'feeds';

    protected $fillable = ['title','category'];
}
