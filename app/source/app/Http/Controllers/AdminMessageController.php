<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Tir\Crud\Controllers\CrudController;

class AdminMessageController extends CrudController
{
    protected function setModel(): string
    {
        return Message::Class;
    }


    protected function read($id)
    {
        $message = Message::find($id);
        $message->status = 'Read';
        $message->save();
    }
}
