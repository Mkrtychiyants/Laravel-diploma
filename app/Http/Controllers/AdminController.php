<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Room;
use App\Models\Seat;
use App\Models\MovieSession;
use Illuminate\Support\Facades\Schema;
use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\CreateSessionRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Requests\UpdateSeatPriceRequest;
use App\Services\CreateSessionService;
use App\Services\RoomCreateService;
use App\Services\CreateMovieService;
use App\Services\UpdateRoomService;
use App\Services\UpdateSeatPriceService;


class AdminController extends Controller
{
    public function index(){
 
        return view("admin.welcome");
    
    }
    public function roomManagement(){

        $rooms = Room::all();
        if(!$rooms){
            return view("admin.roomManagement");
        } else {
            return view("admin.roomManagementWithRooms", ['rooms' => $rooms]);
        };
    
    }
    public function createRoom(){

        (new RoomCreateService())->createRoom();

        return redirect(route('admin.roomManagement'));
    }
    public function deleteRoom(Room $room) {
        $roomToDelete = Room::find($room->id);
        $roomToDelete->delete();
        $rooms = Room::count();
        if(!$rooms){
            Schema::disableForeignKeyConstraints();
            Room::truncate();
            Schema::enableForeignKeyConstraints();
        }
        return back();
    }
    public function roomsConfiguration(){
        $rooms = Room::count();
       
        if(!$rooms){
            return redirect()->route('admin.homepage'); 
        }else { 
            $firstRoom = Room::first();
            return redirect()->action([AdminController::class,'roomConfiguration'], ['room'=> $firstRoom]);
        }
    }

    public function roomConfiguration(Room $room){
        $allRooms = Room::all();
        $seats = $room->seats;
        return view('admin.roomsConfiguration', ['firstRoom' => $room, 'allRooms'=> $allRooms, 'seats' => $seats]); 
    }
    public function roomSeatUpdate(Room $room, Seat $seat){
       
        if($seat->is_blocked){
            $seat->update(
            [
                'is_blocked' => false,
                'is_vip' => false,
            ]);
        } else if (!($seat->is_vip)) {
            $seat->update(
                [
                    'is_vip' => true,
                ]);
        }else {
            $seat->update(
                [
                    'is_vip' => false,
                    'is_blocked' => true,
                ]);
        }
       
        return back()->withInput();
    }
    public function roomUpdate(UpdateRoomRequest $request, Room $room){
        (new UpdateRoomService())->updateRoom($request->validated(), $room);
        return back()->withInput();
    }
    public function roomsPricesConfiguration(){

        $rooms = Room::all();
        
        if(!$rooms){
            return redirect()->route('admin.homepage'); 
        } else {
            $firstRoom = Room::first();
            return redirect()->action([AdminController::class, 'roomPricesConfiguration'], ['room'=> $firstRoom]);
        };

    }
    public function roomPricesConfiguration(Room $room){      
        $rooms = Room::all();;
        $seats = $room->seats()->get();
        $casualSeat = $seats->where('is_vip',false)->first();
        $vipSeat = $seats->where('is_vip',true)->first();
        return view('admin.roomPricesConfig', ['rooms' => $rooms, 'seats' => $seats, 'currentRoom' => $room]);
    }
    public function seatsPricesUpdate(UpdateSeatPriceRequest $request, Room $room){
        (new UpdateSeatPriceService())->updateSeatsPrices($request->validated(), $room);
        return redirect(route('admin.sessionsList'));
    }
    public function sessionsList(){
        $allRooms = Room::all();
        $allMovies = Movie::all();
        $seanses = MovieSession::all();
        if(!$allMovies){
            return view("admin.sessionsManagementNoMovies", ['rooms' => $allRooms, 'seanses' =>$seanses]);
        }
        return view('admin.sessionsManagement', ['rooms' => $allRooms, 'movies' => $allMovies, 'seanses' =>$seanses ]);
    }
    public function createMovie(){

        (new CreateMovieService())->store();
        return back()->withInput();
    }
    public function createSession($movie_id)
    {
        return view('admin.createSession', ['movie_id' => $movie_id]);
    }
    public function storeSession(CreateSessionRequest $request, $movie_id)
    {
        dd($request);
        (new CreateSessionService())->storeSession($request->validated(), $movie_id);

        return redirect(route('admin.sessionsList'));
    }
    public function linkToClient(){
        return view('admin.linkToClient');
    }
}
