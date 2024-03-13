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
use Tir\Crud\Support\Scaffold\Fields\Slug;
use Tir\Crud\Support\Scaffold\Fields\SwitchBox;
use Tir\Crud\Support\Scaffold\Fields\Additional;
use Tir\Crud\Support\Scaffold\Fields\ColorPicker;

use Config;
use File;


class PageSetting extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use BaseScaffold;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'style',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'class',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'events' => 'array',
        'stories' => 'array',
    ];

    protected function setModuleName(): string
    {
        return 'page_setting';
    }

    protected function setAcl(): string
    {
        return false;
    }

    protected function setActions(): array
    {
        return [
            'create' => false,
            'edit' => true,
            'destroy' => false,
            'fullDestroy' => false,
        ];
    }


    protected function setFields(): array
    {

        $app_url = config('app.url');

        return [
            Group::make('left-col')->display('')->children(
                TextArea::make('style')->hideFromIndex(),
                Blank::make('divider')->value("<h2>SEO</h2><hr />")->hideFromIndex(),
                Text::make('meta_title')->rules('required'),
                TextArea::make('meta_description')->hideFromIndex()->rules('required'),
                TextArea::make('meta_keywords')->hideFromIndex(),
            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                Text::make('class')->hideFromIndex(),
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