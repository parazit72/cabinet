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

class Comment extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use BaseScaffold;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'name',
        'email',
        'website',
        'post_id',
        'parent_id',
        'status',
    ];



    protected function setModuleName(): string
    {
        return 'comment';
    }

    protected function setAcl(): string
    {
        return false;
    }


    protected function setFields(): array
    {
        return [

            TextArea::make('content')->rules('required')->hideFromIndex()->searchable(),
            Text::make('name')->rules('required')->searchable(),
            Text::make('email')->rules('required'),
            Text::make('website')->hideFromIndex(),
            Select::make('post_id')->display('Post')->relation('post', 'title')->rules('required'),
            Select::make('parent_id')->relation('parent', 'content')->hideFromIndex(),
            Select::make('status')->data(
                ['value' => 'Published', 'label' => 'Published'],
                ['value' => 'UnPublished', 'label' => 'UnPublished'],
            )->default('Published')->rules('required'),

        ];
    }

    protected function setButtons(): array
    {
        return [
            Button::make('cancel')->action('Cancel')->path('/admin/comment'),
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


    public function post()
    {
        return $this->BelongsTo(Post::class);
    }

    public function parent()
    {
        return $this->BelongsTo(Comment::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
