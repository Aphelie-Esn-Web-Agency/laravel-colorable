<?php

namespace Aphelie\Colorable\Traits;

use Aphelie\Colorable\Models\Color;

trait Colorable
{
    /*
     * Get all of the model's colors.
     */
    public function colors()
    {
        return $this->morphToMany(Color::class, 'colorable')
            ->withTimestamps();
    }

    /*
     * Add a color to the model, default one if no color is given.
     */
    public function setColor($key = null, $hexValue = null)
    {
        if (is_null($key)) {
            $hexValue = config('colorable.default_color_key');
        }
        if (is_null($hexValue)) {
            $hexValue = config('colorable.default_color');
        }
        return $this->colors()->create(['color_value' => $hexValue]);
    }
}