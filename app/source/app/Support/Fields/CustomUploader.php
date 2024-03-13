<?php

namespace App\Support\Fields;


use Tir\Crud\Support\Scaffold\Fields\FileUploader;

class CustomUploader extends FileUploader
{

    protected string $type = 'FileUploader';
    protected string $fileRules;

    public function fileRules($rule): static
    {
        $this->fileRules = $rule;
        return $this;
    }
}
