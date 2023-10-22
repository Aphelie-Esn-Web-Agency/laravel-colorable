<?php

namespace Aphelie\Colorable\Traits;

use Aphelie\Colorable\Models\Color;

trait Colorable
{
    public function colors()
    {
        return $this->morphMany(Color::class, 'colorable');
    }

    public function setColor($hexValue = null)
    {
        if (is_null($hexValue)) {
            $hexValue = config('colorable.default_color');
        }
        return $this->colors()->create(['color_value' => $hexValue]);
    }
}