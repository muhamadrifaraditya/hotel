<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_detail($id)
    {
        $room = Room::find($id);
        return view('home.room_detail', compact('room'));
    }

    public function add_booking(Request $request, $id)
    {
        $request->validate(
            [
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ],
            [
                'start_date.required' => 'Tanggal mulai harus diisi',
                'start_date.date' => 'Tanggal mulai harus berupa tanggal yang valid',
                'end_date.date' => 'Tanggal akhir harus berupa tanggal yang valid',
                'end_date.after' => 'Tanggal akhir harus setelah tanggal mulai',
            ]
        );

        $data = new Booking;
        $data->room_id = $id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->telpon = $request->telpon;


        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $isBooked = Booking::where('room_id', $id)->where('start_date', '<=', $end_date)->where('end_date', '>=', $start_date)->exists();
        if ($isBooked) {
            return redirect()->back()->with('message', 'Kamar sudah di Booking di tanggal tersebut');
        } else {
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->save();
            return redirect()->back()->with('message', 'Kamar Berhasil di Pesan');
        }
    }
}
