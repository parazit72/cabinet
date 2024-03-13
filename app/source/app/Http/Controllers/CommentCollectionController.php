<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Tir\Crud\Controllers\CrudController;

class CommentCollectionController extends CrudController
{

    protected function setModel(): string
    {
        return Comment::class;
    }
}
