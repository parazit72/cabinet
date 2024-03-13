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

class Service extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use BaseScaffold;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'icon',
        'title',
        'description',
        'color',
        'status',
        'parent_id',
        'order'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
    protected function setModuleName(): string
    {
        return 'service';
    }

    protected function setAcl(): string
    {
        return false;
    }

    protected function setFields(): array
    {
        $max = Service::max('order');

        return [

            Number::make('order')->rules('required')->onlyOnIndex()->sortable(),

            Group::make('left-col')->display('')->children(

                Text::make('title')->rules('required')->filter(),
                TextArea::make('description')->rules('required')->hideFromIndex(),

            )->col(17)->hideFromIndex(),
            Group::make('right-col')->display('')->children(
                ColorPicker::make('color')->rules('required')->default('rgba(255,92,92, 1)'),
                Number::make('order')->default($max + 1)->rules('required')->hideFromIndex(),
                FileUploader::make('icon')->maxCount(1)->uploadUrl(env('APP_URL') . '/api/v1/admin/fileUpload')->basePath(env('APP_URL'))->hideFromIndex(),
                Select::make('parent_id')->relation('parent', 'title')->hideFromIndex(),
                Select::make('status')->data(
                    ['value' => 'Published', 'label' => 'Published'],
                    ['value' => 'UnPublished', 'label' => 'UnPublished'],
                )->default('Published')->rules('required')->filter(),

            )->col(7)->hideFromIndex(),

            DatePicker::make('created_at')->disable()->format('yy M d')->onlyOnIndex()->filter(),

        ];
    }


    public function parent()
    {
        return $this->BelongsTo(Service::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(Service::class, 'parent_id')->orderBy('order', 'DESC');
    }

    // protected function setButtons(): array
    // {
    //     return [
    //         Button::make('cancel')->action('Cancel')->path('/admin/post'),
    //         Button::make('submit')->action('Submit'),
    //     ];
    // }
}