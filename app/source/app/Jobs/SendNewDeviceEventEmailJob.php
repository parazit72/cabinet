<?php

namespace App\Jobs;

use App\Mail\NewDeviceMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendNewDeviceEventEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mailData;

    public function __construct($device, $user, $code)
    {
        $this->mailData['user_agent'] = $device['user_agent'];
        $this->mailData['email'] = $device['email'];
        $this->mailData['username'] = $device['username'];
        $this->mailData['ip'] = $device['ip_behind_proxy'] ?? $device['ip'];
        $this->mailData['last_login_at'] = $device['last_login_at'];
        $this->mailData['location'] = $device['location'];
        $this->mailData['user_settings'] = $user->settings;
        $this->mailData['verification_code'] = $code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new NewDeviceMail($this->mailData));

    }
}
