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
use Tir\Crud\Support\Scaffold\Fields\Slug;
use Tir\Crud\Support\Scaffold\Fields\SwitchBox;

use Config;
use File;


class SubService extends Authenticatable
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
        'description',
        'icon',
        'color',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    protected function setModuleName(): string
    {
        return 'sub_service';
    }

    protected function setAcl(): string
    {
        return false;
    }

    // protected function setActions(): array
    // {
    //     return [
    //         'create' => false,
    //         'edit' => true,
    //         'destroy' => false,
    //         'fullDestroy' => false,
    //     ];
    // }


    protected function setFields(): array
    {

        return [
            Number::make('order')->rules('required')->onlyOnIndex()->sortable(),

            Group::make('left-col')->display('')->children(
                Text::make('title')->rules('required')->filter(),
                TextArea::make('description')->rules('required')->hideFromIndex(),

            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                ColorPicker::make('color')->rules('required'),
                FileUploader::make('icon')->maxCount(1)->uploadUrl(env('APP_URL') . '/api/v1/admin/fileUpload')->basePath(env('APP_URL'))
                    ->FileRules('mimes:png,jpg,webp,svg')
                    ->hideFromIndex(),
                Select::make('status')->data(
                    ['value' => 'Published', 'label' => 'Published'],
                    ['value' => 'UnPublished', 'label' => 'UnPublished'],
                )->default('Published')->rules('required')->filter(),
                Number::make('order')->rules('required')->hideFromIndex(),


            )->col(7)->hideFromIndex(),

        ];
    }

    protected function setButtons(): array
    {
        return [
            Button::make('cancel')->action('Cancel')->path('/admin/custom/dashboard'),
            Button::make('submit')->action('Submit'),
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }


    // public function categories()
    // {
    //     return $this->belongsToMany(PostCategory::class);
    // }


    public function scopeSearch($query, $keywords)
    {
        $query->where('title', 'LIKE', '%' . $keywords . '%');
        return $query;
    }
}
