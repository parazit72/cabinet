<?php

namespace App\Http\Controllers;

use App\Models\PageSetting;
use Tir\Crud\Controllers\CrudController;

class AdminPageSettingController extends CrudController
{

    protected function setModel(): string
    {
        return PageSetting::class;
    }
}