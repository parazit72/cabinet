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
use Tir\Crud\Support\Scaffold\Fields\Custom;
use Tir\Crud\Support\Scaffold\Fields\DatePicker;
use Tir\Crud\Support\Scaffold\Fields\Slug;
use Tir\Crud\Support\Scaffold\Fields\SwitchBox;

use Config;
use File;


class Page extends Authenticatable
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
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'intro_image',
        'main_image',
        'redirect',
        'template',
        'style',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    protected function setModuleName(): string
    {
        return 'page';
    }

    protected function setAcl(): string
    {
        return false;
    }
    

    protected function setFields(): array
    {

        $path = Config::get('view.paths')[0]. '/pages';
        $templates = File::allFiles($path);

        $nameTemplate = [];
        foreach($templates as $template) {
            $value = str_replace(".blade", "", pathinfo($template, PATHINFO_FILENAME));

            $nameTemplate[] = (object)[
                'value' => $value,
                'label'  => $value,
            ];
        }

        return [
            Group::make('left-col')->display('')->children(
                Text::make('title')->rules('required')->searchable(),
                Slug::make('slug')->creationRules('required', 'unique:posts,slug,' . $this->id)->hideFromIndex(),
                Editor::make('description')->height(800)->rules('required')->basePath(config('app.url'))->uploadUrl(config('app.url').'/api/v1/admin/fileUpload')->hideFromIndex(),
                TextArea::make('summary')->rules('required')->hideFromIndex(),
                TextArea::make('style')->hideFromIndex(),
                Blank::make('divider')->value("<h2>SEO</h2><hr />")->hideFromIndex(),
                Text::make('meta_title')->hideFromIndex(),
                TextArea::make('meta_description')->hideFromIndex(),
                TextArea::make('meta_keywords')->hideFromIndex(),
            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                Select::make('status')->data(
                    ['value' => 'Draft', 'label' => 'Draft'],
                    ['value' => 'Published', 'label' => 'Published'],
                    ['value' => 'UnPublished', 'label' => 'UnPublished'],
                )->default('Published')->rules('required')->filter(),
                Select::make('template')->data(...$nameTemplate)->default('blank')->rules('required')->filter(),
                Text::make('redirect')->display('Redirect(301)')->hideFromIndex(),
                Custom::make('slug')->type('CustomPreviewPage')->onlyOnEditing(),
            )->col(7)->hideFromIndex(),


            DatePicker::make('created_at')->disable()->format('yy M d')->onlyOnIndex()->filter(),

        ];
    }

    protected function setButtons(): array
    {
        return [
            Button::make('cancel')->action('Cancel')->path('/admin/post'),
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