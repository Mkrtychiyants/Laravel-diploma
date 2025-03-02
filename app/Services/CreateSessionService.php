<?php

namespace App\Services;
use App\Models\MovieSession;
use App\Models\Ticket;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Support\Carbon;


class CreateSessionService
{
    /**
     * Create a new class instance.
     */
    public function storeSession(array $sessionData, $movie_id)
    {
        dd($movie_id);
        $movie = Movie::findOrFail($movie_id);
        $number = 1;
        $room = Room::findOrFail($sessionData['room_id']);
        $seans = new MovieSession();
        $start = $sessionData['start'];
        $seans ->fill([
            'room_id' =>$sessionData['room_id'],
            'movie_id' => $sessionData['movie_id'],
            'session_datetime' => $start,
            'session_date' =>Carbon::parse($start)->format('Y-m-d'),
            'distribution_finish_date' =>Carbon::parse($sessionData['distributionFinish'])->format('Y-m-d'),
            'start_time' =>Carbon::parse($start)->format('H:i:s'),
            'finish_time' =>Carbon::parse($start)->addMinutes($movie->duration)->format('H:i:s'),
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(),
        ]);
        dd($seans);
        $seans->save();

        foreach ($room->seats as $seat){
            if(!$seat->is_blocked){
                $ticket = new Ticket();
                $ticket->fill([
                'movie_session_id' => $seans->id,
                'seat_id' => $seat->id,
                'final_seat_number' => $number++,
                'price' =>$seat->price,
                'is_vip'=> $seat->is_vip,
                'is_blocked'=> $seat->is_blocked,
                'is_selected'=> false,
                'is_purchased'=> false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]); 
                $ticket->save();
            }
            if($seat->is_blocked){
                $ticket = new Ticket();
                $ticket->fill([
                'movie_session_id' => $seans->id,
                'seat_id' => $seat->id,
                'final_seat_number' => null,
                'price' =>$seat->price,
                'is_vip'=> $seat->is_vip,
                'is_blocked'=> $seat->is_blocked,
                'is_selected'=> false,
                'is_purchased'=> false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]); 
                $ticket->save();

            } 
        }
    
       

        return redirect(route('admin.sessionsList'));
    }
}
