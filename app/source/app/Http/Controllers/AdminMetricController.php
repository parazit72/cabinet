<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use Tir\Crud\Controllers\CrudController;

class AdminMetricController extends CrudController
{
    protected function setModel(): string
    {
        return Metric::Class;
    }
}
