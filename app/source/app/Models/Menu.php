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
use Tir\Crud\Support\Scaffold\Fields\Slug;
use Tir\Crud\Support\Scaffold\Fields\SwitchBox;

class Menu extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use BaseScaffold;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'link',
        'url',
        'order',
        'status',
        'target',
        'status',
        'icon',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
    protected function setModuleName(): string
    {
        return 'menu';
    }

    protected function setAcl(): string
    {
        return false;
    }

    protected function setFields(): array
    {
        $app_url = config('app.url');

        return [

            Number::make('order')->rules('required')->onlyOnIndex()->sortable(),
            Group::make('left-col')->display('')->children(
                Text::make('title')->rules('required'),
                Text::make('url')->rules('required'),
            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                Select::make('position')->data(
                    ['value' => 'header', 'label' => 'Header'],
                    ['value' => 'col_a', 'label' => 'Reach us'],
                    ['value' => 'col_b', 'label' => 'Primary Pages'],
                )->default('header')->rules('required')->filter(),
                Number::make('order')->rules('required')->hideFromIndex(),
                FileUploader::make('icon')->maxCount(1)->uploadUrl($app_url . '/api/v1/admin/fileUpload')->basePath($app_url)->hideFromIndex(),
                Select::make('target')->data(
                    ['value' => '_self', 'label' => 'Self'],
                    ['value' => '_blank', 'label' => 'Blank'],
                )->default('_self')->rules('required')->filter(),
                Select::make('status')->data(
                    ['value' => 'Enable', 'label' => 'Enable'],
                    ['value' => 'Disable', 'label' => 'Disable'],
                )->default('Enable')->rules('required')->filter(),
            )->col(7)->hideFromIndex(),

            // DatePicker::make('created_at')->disable()->format('yy M d')->onlyOnIndex()->filter(),

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
