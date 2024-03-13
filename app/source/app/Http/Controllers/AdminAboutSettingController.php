<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use Tir\Crud\Controllers\CrudController;

class AdminAboutSettingController extends CrudController
{

    protected function setModel(): string
    {
        return AboutSetting::class;
    }
}