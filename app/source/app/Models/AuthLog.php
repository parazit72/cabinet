<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Tir\Crud\Support\Scaffold\BaseScaffold;
use Tir\Crud\Support\Scaffold\Fields\DatePicker;
use Tir\Crud\Support\Scaffold\Fields\Select;
use Tir\Crud\Support\Scaffold\Fields\Text;

class AuthLog extends Model
{
    use BaseScaffold;

    protected $table = 'authentication_logs';
    protected $fillable = ['username', 'password', 'email', 'action', 'request_data'];

    protected $casts = [
        'request_data' => 'array',
    ];

    protected function setAcl(): string
    {
        return false;
    }

    protected function setActions(): array
    {
        return [
            'create' => false,
            'edit' => false,
            'destroy' => false,
            'fullDestroy' => false,
        ];
    }


    protected function setModuleName(): string
    {
        return 'authlog';
    }

    protected function setModuleTitle(): string
    {
        return trans('panel.auth_logs');
    }
    protected function setFields(): array
    {
        return [
            Text::make('email')->searchable(),
            //            Text::make('password'),
            Select::make('action')->data(
                [
                    'label' => 'Logged In',
                    'value' => 'logged-in'
                ],
                [
                    'label' => 'Logged Out',
                    'value' => 'logged-out'
                ],
                [
                    'label' => 'Login Failed',
                    'value' => 'login-failed'
                ],
                [
                    'label' => 'User Blocked',
                    'value' => 'blocked'
                ]
            )->filter(),

            Text::make('request_data.ip_simple')->display('IP'),
            Text::make('request_data.ip_behind_proxy')->display('Real IP Behind Proxy'),
            Select::make('request_data.location')->data(...$this->getLocationData())->filter()->display('Location'),
            Text::make('request_data.device')->display('Device')->hideFromIndex(),
            Text::make('request_data.host')->display('Host'),
            Text::make('request_data.ddc')->display('DDC')->hideFromIndex(),
            Datepicker::make('created_at')->format('Y-m-d G:i:s'),
        ];
    }

    private function getLocationData()
    {
        $data = [];
        $locations = $this->select('request_data')->distinct('request_data.location')->get()->pluck('request_data.location')->toArray();
        $locations = Arr::flatten($locations);

        foreach ($locations as $d) {
            if ($d != null)
                $data[] = [
                    'label' => $d,
                    'value' => $d,
                ];
        }
        return $data;
    }
}
