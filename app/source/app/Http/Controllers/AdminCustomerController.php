<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Tir\Crud\Controllers\CrudController;

class AdminCustomerController extends CrudController
{
    protected function setModel(): string
    {
        return Customer::Class;
    }
}
