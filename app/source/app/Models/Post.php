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

class Post extends Authenticatable
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
        'summary',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'categories',
        'intro_image',
        'main_image',
        'author',
        'special',
        'post_collection_id',
        'redirect',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'categories' => 'array',
        'published_at' => 'datetime',
    ];

    protected function setModuleName(): string
    {
        return 'post';
    }

    protected function setAcl(): string
    {
        return false;
    }

    protected function setFields(): array
    {
        $app_url = config('app.url');

        return [
            Group::make('left-col')->display('')->children(
                Text::make('title')->rules('required')->searchable(),
                Slug::make('slug')->creationRules('required', 'unique:posts,slug,' . $this->id)->hideFromIndex(),
                Editor::make('description')->height(800)->rules('required')->basePath($app_url)->uploadUrl($app_url .'/api/v1/admin/fileUpload')->hideFromIndex(),
                TextArea::make('summary')->rules('required')->hideFromIndex(),
                Blank::make('divider')->value("<h2>SEO</h2><hr />")->hideFromIndex(),
                Text::make('meta_title')->hideFromIndex(),
                TextArea::make('meta_description')->hideFromIndex(),
                TextArea::make('meta_keywords')->hideFromIndex(),
            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                // SwitchBox::make('special')->hideFromIndex(),
                Select::make('status')->data(
                    ['value' => 'Draft', 'label' => 'Draft'],
                    ['value' => 'Published', 'label' => 'Published'],
                    ['value' => 'UnPublished', 'label' => 'UnPublished'],
                )->default('Published')->rules('required')->filter(),
                FileUploader::make('intro_image')->display('image')->maxCount(1)->uploadUrl($app_url .'/api/v1/admin/fileUpload')->basePath($app_url)->hideFromIndex(),
                Text::make('author')->rules('required')->rules('required')->hideFromIndex(),
                Text::make('redirect')->display('Redirect(301)')->hideFromIndex(),
                DatePicker::make('published_at')->format('yy M d')->rules('required'),

            )->col(7)->hideFromIndex(),

            DatePicker::make('created_at')->disable()->format('yy M d')->onlyOnIndex(),

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

    public function tags()
    {
        return $this->belongsToMany(PostTag::class);
    }


    public function collection()
    {
        return $this->belongsTo(PostCollection::class, 'post_collection_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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