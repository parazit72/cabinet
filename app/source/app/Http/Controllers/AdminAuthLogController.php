<?php

namespace App\Http\Controllers;

use App\Models\AuthLog;
use Tir\Crud\Controllers\CrudController;

class AdminAuthLogController extends CrudController
{
    protected function setModel(): string
    {
        return AuthLog::Class;
    }
}
