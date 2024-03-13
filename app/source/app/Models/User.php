<?php

namespace App\Models;

use App\Models\Authorization\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tir\Crud\Support\Scaffold\BaseScaffold;
use Tir\Crud\Support\Scaffold\Fields\CheckBox;
use Tir\Crud\Support\Scaffold\Fields\Number;
use Tir\Crud\Support\Scaffold\Fields\Password;
use Tir\Crud\Support\Scaffold\Fields\Select;
use Tir\Crud\Support\Scaffold\Fields\Text;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens,  BaseScaffold;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'must_change_password' => 'boolean'
    ];

    protected $fillable = [
        'name', 'status', 'email', 'password', 'type', 'email_verified_at', 'mobile', 'user_id', 'failed_login_attempts', 'must_change_password'
    ];

    protected $hidden = array('password', 'api_token', 'remember_token');


    public static function booted()
    {
        parent::boot();

        static::creating(function (self $model) {

            $model->user_id = auth()->id();
        });
    }

    protected function setModuleName(): string
    {
        return 'user';
    }


    protected function setAcl(): string
    {
        return false;
    }

    protected function setFields(): array
    {
        return [
            Text::make('name')->rules('required'),
            Text::make('email')->rules('required', 'unique:users,email,' . request()->route('user'))->hideFromIndex(),
            Password::make('password')->creationRules('required', 'min:6')->hideFromIndex(),
            Number::make('failed_login_attempts')->hideFromIndex(),
            // CheckBox::make('must_change_password')->hideFromIndex(),
            Select::make('type')
                ->data(['label' => 'Admin', 'value' => 'admin'], ['label' => 'User', 'value' => 'user'])->rules('required')->default('admin'),
            // Select::make('roles')->relation('roles', 'name')->multiple()->rules('required')->filter(),
            Select::make('status')->data(
                ['label' => 'Disabled', 'value' => 'disabled'],
                ['label' => 'Enabled', 'value' => 'enabled'],
                ['label' => 'Blocked', 'value' => 'blocked']
            )->rules('required')->default('enabled')
        ];
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }



    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function verificationCodes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VerificationCode::class);
    }

    public function devices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Device::class);
    }
}