<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Tir\Crud\Controllers\CrudController;

class ReviewCollectionController extends CrudController
{

    protected function setModel(): string
    {
        return Review::class;
    }
}
