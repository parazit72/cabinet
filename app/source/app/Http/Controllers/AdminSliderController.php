<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Tir\Crud\Controllers\CrudController;

class AdminSliderController extends CrudController
{
    protected function setModel(): string
    {
        return Slider::Class;
    }
}
