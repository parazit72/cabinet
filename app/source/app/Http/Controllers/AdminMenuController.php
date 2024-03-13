<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Tir\Crud\Controllers\CrudController;

class AdminMenuController extends CrudController
{
    protected function setModel(): string
    {
        return Menu::Class;
    }
}