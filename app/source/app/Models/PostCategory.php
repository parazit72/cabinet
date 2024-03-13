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

class PostCategory extends Authenticatable
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
        'status',
        'image',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function setModuleName(): string
    {
        return 'postCategory';
    }

    protected function setAcl(): string
    {
        return false;
    }



    protected function setFields(): array
    {
        return [
            Group::make('left-col')->display('')->children(
                Text::make('title')->rules('required'),
                Text::make('slug')->creationRules('required', 'unique:posts,slug,' . $this->id)->hideFromIndex(),
                // Editor::make('description')->height(800)->rules('required')->hideFromIndex(),
                Blank::make('divider')->value("<h2>SEO</h2><hr />")->hideFromIndex(),
                Text::make('meta_title')->hideFromIndex(),
                TextArea::make('meta_description')->hideFromIndex(),
                // Text::make('meta_keywords')->hideFromIndex(),

            )->col(18)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                Select::make('status')->data(
                    ['value' => 'Draft', 'label' => 'Draft'],
                    ['value' => 'Published', 'label' => 'Published'],
                    ['value' => 'UnPublished', 'label' => 'UnPublished'],
                )->rules('required'),
                // FileUploader::make('image')->maxCount(1)->hideFromIndex(),

            )->col(6)->hideFromIndex(),


            Text::make('title')->searchable()->onlyOnIndex(),
            Select::make('status')->data(
                ['value' => 'Draft', 'label' => 'Draft'],
                ['value' => 'Published', 'label' => 'Published'],
                ['value' => 'UnPublished', 'label' => 'UnPublished'],
            )->filter()->onlyOnIndex(),


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


    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
