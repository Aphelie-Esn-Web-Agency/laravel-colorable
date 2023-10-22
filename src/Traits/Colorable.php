<?php

namespace Aphelie\Colorable\Traits;

use Aphelie\Colorable\Models\Color;

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