<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Tir\Crud\Controllers\CrudController;

class PostCategoryController extends CrudController
{

    protected function setModel(): string
    {
        return PostCategory::class;
    }
}
