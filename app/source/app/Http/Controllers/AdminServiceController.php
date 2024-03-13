<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Tir\Crud\Controllers\CrudController;

class AdminServiceController extends CrudController
{
    protected function setModel(): string
    {
        return Service::Class;
    }
}
