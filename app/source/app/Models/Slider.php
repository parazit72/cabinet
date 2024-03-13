<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tir\Crud\Support\Scaffold\BaseScaffold;
use Tir\Crud\Support\Scaffold\Fields\Button;
use App\Support\Fields\CustomUploader as FileUploader;
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

use Config;

class Slider extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use BaseScaffold;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'background',
        'title',
        'description',
        'cta_text',
        'cta_link',
        'cta_color',
        'cta_bg',
        'status',
        'order',
        'style'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'background' => 'array',
    ];
    protected function setModuleName(): string
    {
        return 'slider';
    }

    protected function setAcl(): string
    {
        return false;
    }

    protected function setFields(): array
    {

        $app_url = config('app.url');

        $max = Slider::max('order');

        return [

            Number::make('order')->rules('required')->onlyOnIndex()->sortable(),

            Group::make('left-col')->display('')->children(
                Text::make('title')->filter(),
                Editor::make('description')->hideFromIndex(),
                FileUploader::make('background.mpeg')->display('mp4')->maxCount(1)->uploadUrl($app_url . '/api/v1/admin/fileUpload/mpeg')->basePath($app_url)
                    ->fileRules('mimes:mp4')
                    ->hideFromIndex(),
                FileUploader::make('background.webm')->display('webm')->maxCount(1)->uploadUrl($app_url . '/api/v1/admin/fileUpload/webm')->basePath($app_url)
                    ->fileRules('mimes:webm')
                    ->hideFromIndex(),
                FileUploader::make('background.image')->display('photo')->maxCount(1)->uploadUrl($app_url . '/api/v1/admin/fileUpload/image')->basePath($app_url)
                    ->fileRules('mimes:png,jpg,webp')
                    ->hideFromIndex(),
                TextArea::make('style')->hideFromIndex(),
            )->col(17)->hideFromIndex(),

            Group::make('right-col')->display('')->children(
                ColorPicker::make('cta_color')->hideFromIndex()->col(12)->default('rgba(255, 255, 255, 1)')->rules('required'),
                ColorPicker::make('cta_bg')->hideFromIndex()->col(12)->default('rgba(255,92,92, 1)')->rules('required'),
                Text::make('cta_text')->disable('call to action')->hideFromIndex(),
                Text::make('cta_link')->disable('call to action link')->hideFromIndex(),
                Number::make('order')->rules('required')->default($max + 1)->hideFromIndex(),
                Select::make('status')->data(
                    ['value' => 'Published', 'label' => 'Published'],
                    ['value' => 'UnPublished', 'label' => 'UnPublished'],
                )->default('Published')->rules('required')->filter(),

            )->col(7)->hideFromIndex(),

            DatePicker::make('created_at')->disable()->format('yy M d')->onlyOnIndex()->filter(),

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