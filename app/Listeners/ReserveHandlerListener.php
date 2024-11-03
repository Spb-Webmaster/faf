<?php

namespace App\Listeners;

use App\Events\OrderCallEvent;
use App\Events\ReserveEvent;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReserveHandlerListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * сообщение user, о том, нужно поззвонить (заказ звонка)
     */
    public function handle(ReserveEvent $event): void
    {
        $data['phone'] = $event->request->phone;
        $data['name'] = $event->request->name;
        $data['email'] = ($event->request->email)?:'';
        $data['title'] = ($event->request->title)?:'';
        $data['price'] = ($event->request->price)?:'';
        $data['url'] = $event->request->url;

        $sendMail =  new SendMails();
        $sendMail->reserveCall($data);

    }
}
