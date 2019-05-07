<?php

namespace App\Listeners;

use App\Events\TaskEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DatabaseNotification;
use App\user;

class TaskEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Handle the event.
     *
     * @param  TaskEvent  $event
     * @return void
     */
    public function handle(TaskEvent $event)
    {
        if($event->send_to == ''){
            $users = User::all();
            $letter = collect(['id'=>$event->news->id,'title'=>'New News Updated','body'=>$event->news->title]);
            Notification::send($users,new DatabaseNotification($letter));
        }else{
            $users = User::find($event->send_to);
            $letter = collect(['id'=>$event->news->id,'title'=>'New News Updated','body'=>$event->news->title]);
            Notification::send($users,new DatabaseNotification($letter));
        }
        
    }
}
