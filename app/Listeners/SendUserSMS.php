<?php

namespace App\Listeners;

use App\Events\SMSCreated;
use App\Firebase;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Ipecompany\Smsirlaravel\Smsirlaravel;
use Kavenegar\KavenegarApi;

class SendUserSMS implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SMSCreated  $event
     * @return void
     */
    public function handle(SMSCreated $event)
    {
        $digits = 5;
        $random_number = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $check_device = Firebase::where('user_id' , $event->user_id)->where('device' ,$event->device)->first();
        $check_device->update([
            'code' => $random_number
        ]);

        $text = "برای فعال سازی حساب خود از این کد استفاده کنید : ".$random_number ;
        Smsirlaravel::send($text,$event->phone);
    }
}
