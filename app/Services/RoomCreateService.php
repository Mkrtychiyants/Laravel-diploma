<?php

namespace App\Services;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class RoomCreateService
{
    public function createRoom(){
        $room = new Room();
        $room ->fill([
            'title' =>"Room ".mt_rand(1, 35),
            'rows' =>5,
            'columns' =>5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $room->save();
         
        for ($i=1; $i <= $room->rows ; $i++) { 
            for ($j=0; $j < $room->columns ; $j++) {
                $seat= new Seat();
                $seat->fill([
                    'room_id' =>  $room->id,
                    'row' => $i,
                    'price' => 100,
                    'is_vip' => false,
                    'is_blocked' => false,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]); 
                $seat->save();
            }
        }
        return redirect(route('admin.roomManagement'));
    }
}
