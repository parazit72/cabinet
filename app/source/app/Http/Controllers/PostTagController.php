<?php

namespace App\Http\Controllers;

use App\Models\PostTag;
use Tir\Crud\Controllers\CrudController;

class PostTagController extends CrudController
{

    protected function setModel(): string
    {
        return PostTag::class;
    }
}
