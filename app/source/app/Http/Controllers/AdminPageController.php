<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Tir\Crud\Controllers\CrudController;

class AdminPageController extends CrudController
{

    protected function setModel(): string
    {
        return Page::class;
    }
}