<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\HomeworkNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NewHomeworkNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $homework = $event->homework;
        $students = $homework->classe->students;
        $users = User::whereIn('id', $students->pluck('user_id'))->get();
        foreach($users as $user){
            $user->notify(new HomeworkNotification($homework));
        }
    }
}
