<?php

namespace LaravelColorable\Traits;

use LaravelColorable\Models\Color;

trait Colorable
{
    public function colors()
    {
        return $this->morphMany(Color::class, 'colorable');
    }

    public function setColor($hexValue)
    {
        return $this->colors()->create(['color_value' => $hexValue]);
    }
}