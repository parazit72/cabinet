<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Tir\Crud\Controllers\CrudController;

class NewsletterController extends CrudController
{

    protected function setModel(): string
    {
        return Newsletter::class;
    }
}
