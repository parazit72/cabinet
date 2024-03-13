<?php

namespace App\Http\Controllers;

use App\Models\PostCollection;
use Tir\Crud\Controllers\CrudController;

class PostCollectionController extends CrudController
{

    protected function setModel(): string
    {
        return PostCollection::class;
    }
}
