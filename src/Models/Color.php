<?php

namespace Aphelie\LaravelColorable\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['color_value', 'colorable_id', 'colorable_type'];

    public function colorable()
    {
        return $this->morphTo();
    }
}