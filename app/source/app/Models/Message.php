<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tir\Crud\Support\Scaffold\BaseScaffold;
use Tir\Crud\Support\Scaffold\Fields\Button;
use Tir\Crud\Support\Scaffold\Fields\FileUploader;
use Tir\Crud\Support\Scaffold\Fields\Editor;
use Tir\Crud\Support\Scaffold\Fields\TextArea;
use Tir\Crud\Support\Scaffold\Fields\Text;
use Tir\Crud\Support\Scaffold\Fields\Select;
use Tir\Crud\Support\Scaffold\Fields\Group;
use Tir\Crud\Support\Scaffold\Fields\Blank;
use Tir\Crud\Support\Scaffold\Fields\DatePicker;
use Tir\Crud\Support\Scaffold\Fields\Number;
use Tir\Crud\Support\Scaffold\Fields\ColorPicker;
use Tir\Crud\Support\Scaffold\Fields\Custom;
use Tir\Crud\Support\Scaffold\Fields\Slug;
use Tir\Crud\Support\Scaffold\Fields\SwitchBox;

class Message extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use BaseScaffold;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'job',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'interested',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
    protected function setModuleName(): string
    {
        return 'message';
    }

    protected function setAcl(): string
    {
        return false;
    }

    protected function setActions(): array
    {
        return [
            'create' => false,
            'edit' => false,
            'destroy' => false,
            'fullDestroy' => false,
        ];
    }

    protected function setFields(): array
    {
        return [
            Group::make('left-col')->display('')->children(

                Text::make('name')->rules('required'),
                Text::make('job')->rules('required')->hideFromIndex(),
                Text::make('email')->rules('required'),
                Text::make('interested')->rules('required')->hideFromIndex(),

            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                Select::make('status')->data(
                    ['value' => 'Read', 'label' => 'Read'],
                    ['value' => 'UnRead', 'label' => 'UnRead'],
                )->default('Published')->rules('required')->filter()->onlyOnIndex(),
            )->col(7)->hideFromIndex(),

            DatePicker::make('created_at')->disable()->format('yy M d')->onlyOnIndex()->filter(),
            Custom::make('reading')->type('CustomReading')->hideFromIndex(),

        ];
    }

    // protected function setButtons(): array
    // {
    //     return [
    //         Button::make('cancel')->action('Cancel')->path('/admin/post'),
    //         Button::make('submit')->action('Submit'),
    //     ];
    // }
}
