<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function __construct()
    {
        // only()メソッドを使って、限定
        $this->middleware(['auth', 'verified'])->only(['reserve', 'delete']);
    }


    public function reserve(ReservationRequest $request)
    {
        $reservation_datetime = $request->date.' '.$request->time;

        $items = [
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'reservation_datetime' => $reservation_datetime,
            'user_number' => $request->number,
        ];

        Reservation::create($items);

        return view('done');
    }

    public function delete(Request $request)
    {
        Reservation::where('id', $request->id)->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $reservation_datetime = $request->date.' '.$request->time;

        $items = [
            'reservation_datetime' => $reservation_datetime,
            'user_number' => $request->number,
        ];

        Reservation::where('id', $request->id)->update($items);
        return redirect()->back();
    }
}
