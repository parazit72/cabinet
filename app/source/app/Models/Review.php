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
use Tir\Crud\Support\Scaffold\Fields\Slug;
use Tir\Crud\Support\Scaffold\Fields\SwitchBox;

class Review extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use BaseScaffold;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile',
        'name',
        'role',
        'company',
        'title',
        'body',
        'status',
        'rating',
        'order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    protected function setModuleName(): string
    {
        return 'review';
    }

    protected function setAcl(): string
    {
        return false;
    }

    protected function setFields(): array
    {

        $max = Review::max('order');

        return [
            Number::make('order')->rules('required')->onlyOnIndex()->sortable(),

            Group::make('left-col')->display('')->children(

                Editor::make('body')->height(800)->rules('required')->basePath(env('APP_URL'))->uploadUrl(env('APP_URL') . '/api/v1/admin/fileUpload')->hideFromIndex(),

            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(

                Text::make('name')->rules('required')->filter(),
                Text::make('role')->rules('required')->hideFromIndex(),
                Text::make('company')->rules('required')->hideFromIndex(),
                Number::make('order')->default($max + 1)->rules('required')->hideFromIndex(),
                FileUploader::make('profile')->maxCount(1)->uploadUrl(env('APP_URL') . '/api/v1/admin/fileUpload')->basePath(env('APP_URL'))->hideFromIndex(),
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