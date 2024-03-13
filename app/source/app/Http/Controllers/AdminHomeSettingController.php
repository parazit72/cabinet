<?php

namespace App\Http\Controllers;

use App\Models\HomeSettings;
use Tir\Crud\Controllers\CrudController;

class AdminHomeSettingController extends CrudController
{

    protected function setModel(): string
    {
        return HomeSettings::class;
    }
}