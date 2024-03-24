<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Reservation;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\Illuminate\Support\Facades\Auth::user()->role === 'admin') {
            // Recupera tutte le prenotazioni con i relativi corsi e utenti associati
            $reservations = Reservation::with('course', 'user')->get();
            
            // Recupera anche tutti gli utenti e i corsi necessari
            $users = User::all();
            $courses = Course::all();
            
            // Passa gli utenti, i corsi e le prenotazioni alla vista
            return view("viewReservation", ['users' => $users, 'courses' => $courses, 'reservations' => $reservations]);
        } else {
            return redirect()->route('course.index')->with('error', 'You are not authorized to access this page.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $reservation = new Reservation();
        $reservation->status = 'pending'; 
        $reservation->course_id = $request->course_id;
        $reservation->user_id = $user_id;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation has been made successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation = Reservation::findOrFail($request->reservation_id);

        // verifica quale pulsante è stato premuto e aggiorna lo stato di conseguenza
        if ($request->has('accept')) {
            $reservation->status = 'accepted';
        } elseif ($request->has('reject')) {
            $reservation->status = 'rejected';
        } elseif($request->has('book_again')) {
            $reservation->status = 'pending';
        }

        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
