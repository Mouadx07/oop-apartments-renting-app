<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //

    public function store(Request $request){
        $data = [
            "nights" => $request->input("nights"),
            "starts"=> now(),
            "ends" => now()->addDays((int)$request->input("nights")),
            "user_id" => $request->input("userId"),
            "apartment_id" => $request->input("apartmentId"),
        ];
        //
        $booking = Booking::create($data);
        //return response()->json(["success"=> 1, "bookingId"=>$booking->id]);
        Payment::create([
            "amount"=>$request->input("price"),
            "booking_id"=>$booking->id,
        ]);
        return response()->json(["success"=> 1, "bookingId"=>$booking->id]);
    }
}
