<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Room;
use App\Models\Movie;
use App\Models\Ticket;
use App\Models\MovieSession;
use App\Models\FinalTicket;
use App\Models\Seat;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ClientController extends Controller
{
    public function index($date)
    {
       
        $rooms = Room::all();
        $movies = Movie::all();
        $seansesToday = MovieSession::where('session_date', $date)->get();
        if($seansesToday->isNotEmpty()){
            return view('client.welcome', ['movies' => $movies, 'seanses' => $seansesToday , 'rooms' => $rooms ]);
        }else{
            return view('client.welcomeBlank', ['movies' => $movies, 'seanses' => $seansesToday , 'rooms' => $rooms ]);
        }

        
    }
    public function show(MovieSession $seans)
    {
        
        $vipSeatPrice = $seans->room->seats()->where('is_vip','=', true)->firstOrFail()->price;
        
        $regularSeatPrice = $seans->room->seats()->where('is_vip','=', false)->first()->price;

        $tickets = $seans->tickets()->get();  
       
        $seats = $seans->room->seats()->get();
   
        return view('client.sessionProfile', ['session' => $seans,'vipPrice' => $vipSeatPrice,'regularPrice' => $regularSeatPrice, 'tickets'=> $tickets]);
    }
    public function update(Request $request, Ticket $ticket)
    {
        
        $ticket->is_selected ?  $ticket->update(['is_selected' => false]) :  $ticket->update(['is_selected' => true]);
        return back()->withInput();
    }
    public function create(MovieSession $seans)
    {
        $selectedTickets = $seans->tickets()->where('is_selected','=', true)->get();
        
        $finalPrice=0;
        $ticketSeats="";
        $row = Seat::findOrFail($selectedTickets[0]->seat_id)->row;
        
        foreach ($selectedTickets as $ticket){
            $finalPrice +=  $ticket->price;
            $ticketSeats .=$ticket->final_seat_number.',';
        };

        $ticketSeats= rtrim($ticketSeats, ',');
        
        $finalTicket = new FinalTicket();
        $finalTicket->fill([
            'seans_id' => $seans->id,
            'price' => $finalPrice,
            'seats'=> $ticketSeats,
            'row'=> $row,
            'is_selected'=> false,
            'is_purchased'=> false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $finalTicket->save();
        return view('client.ticketProfile', ['session' => $seans,'finalTicket' => $finalTicket]);
        
    }
    public function showQr(MovieSession $seans, FinalTicket $finalTicket)
    {
        
        $movieTitle = $seans->movie->title;
        $roomId = $seans->room->id;
        $startTime = $seans->start_time;
  
        $codeContents = "Movie title: ".$movieTitle."\n";
        $codeContents .= "Seats: ".$finalTicket->seats."\n";
        $codeContents .= "Row: ".$finalTicket->row."\n";
        $codeContents .= "Room: ".$roomId."\n";
        $codeContents .= "Seats: ".$finalTicket->seats."\n";
        $codeContents .= "Session start time: ".$startTime."\n";
        $codeContents .= "Price: ".$finalTicket->price."\n";

        $image = QrCode::size(200)->generate($codeContents);

        return view('client.ticketProfileQr', ['session' => $seans,'image' => $image, 'finalTicket' => $finalTicket ]);
    }
}
    