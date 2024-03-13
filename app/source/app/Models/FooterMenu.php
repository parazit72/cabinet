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

class FooterMenu extends Authenticatable
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
        'order',
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
        return 'footer_menu';
    }

    protected function setAcl(): string
    {
        return false;
    }

    protected function setFields(): array
    {
        return [

            Number::make('order')->rules('required')->onlyOnIndex()->sortable(),

            Group::make('left-col')->display('')->children(

                Text::make('title')->rules('required'),
                Text::make('url')->rules('required'),

            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                FileUploader::make('icon')->maxCount(1)->uploadUrl(env('APP_URL') . '/api/v1/admin/fileUpload')->basePath(env('APP_URL'))->hideFromIndex(),
                Number::make('order')->rules('required')->hideFromIndex(),
                Select::make('column')->data(
                    ['value' => 'header', 'label' => 'Header'],
                    ['value' => 'col_b', 'label' => 'Primary Pages'],
                    ['value' => 'col_b', 'label' => 'Primary Pages'],
                Select::make('target')->data(
                    ['value' => '_self', 'label' => 'Self'],
                    ['value' => '_blank', 'label' => 'Blank'],
                )->default('Published')->rules('required')->filter(),
                Select::make('status')->data(
                    ['value' => 'Enable', 'label' => 'Enable'],
                    ['value' => 'Disable', 'label' => 'Disable'],
                )->default('Published')->rules('required')->filter(),
                

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