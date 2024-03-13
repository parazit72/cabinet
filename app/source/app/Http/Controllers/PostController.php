<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Tir\Crud\Controllers\CrudController;

class PostController extends CrudController
{

    protected function setModel(): string
    {
        return Post::class;
    }
}
