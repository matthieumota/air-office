<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ReservationController extends Controller
{
    public function store(Request $request, Office $office)
    {
        $request->validate([
            'start_at' => 'required|after:today',
            'end_at' => 'required|after:start_at',
        ]);

        $hasReservations = $office->reservations()->whereBetween('start_at', [$request->start_at, $request->end_at])
            ->orWhereBetween('end_at', [$request->start_at, $request->end_at])->exists();

        if ($hasReservations) {
            return back()->withErrors(['start_at' => 'Vous ne pouvez pas réserver sur cette plage de dates.']);
        }

        $numberOfDays = Date::parse($request->end_at)->diffInDays(Date::parse($request->start_at)) + 1;

        Reservation::create([
            'price' => $numberOfDays * $office->price,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'office_id' => $office->id,
            'user_id' => $request->user()->id,
        ]);

        return redirect('/reservations');
    }
}
