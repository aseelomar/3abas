<?php

namespace App\Listeners;

use App\Events\CreateNotificationEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CreateNotification
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
    public function handle(CreateNotificationEvent $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        if($event->modename == "contactUS"){
            $table='contact_us';

               $user_form = $event->data->created_by;
               if($event->data->user){
                   $user_to = $event->data->user->id ;
                   $saveNotification = DB::table('notifications')->insert(
                       ['user_form' =>  $user_form, 'user_to' => $user_to,'row_id'=>$event->data->id, 'created_at' => $current_timestamp, 'updated_at' => $current_timestamp,'table'=>$table]
                   );
               }


        }elseif ($event->modename == "orderReject"){
            $user_form = $event->data->created_by;
            $user_to = $event->data->client_id ?? 0;
            $table='orders';
            $saveNotification = DB::table('notifications')->insert(
                ['user_form' =>  $user_form, 'user_to' => $user_to,'row_id'=>$event->data->id, 'created_at' => $current_timestamp, 'updated_at' => $current_timestamp,'table'=>$table]
            );

        }




    }
}
