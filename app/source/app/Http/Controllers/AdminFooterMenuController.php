<?php

namespace App\Http\Controllers;

use App\Models\FooterMenu;
use Tir\Crud\Controllers\CrudController;

class AdminFooterMenuController extends CrudController
{
    protected function setModel(): string
    {
        return FooterMenu::Class;
    }
}