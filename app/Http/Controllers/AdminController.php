<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use id;

class AdminController extends Controller
{
    public function index()
    {
        $room = Room::all();
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'user') {
                return view('home.index', compact('room'));
            } elseif ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function home()
    {
        $room = Room::all();
        return view('home.index', compact('room'));
    }

    public function create_kamar()
    {
        return view('admin.create_kamar');
    }

    public function tambah_kamar(Request $request)
    {
        $data = new Room;
        $data->nama_kamar = $request->kamar;
        $data->deskripsi = $request->desk;
        $data->harga = $request->harga;
        $data->wifi = $request->wifi;
        $data->type_kamar = $request->type;
        $gambar = $request->gambar;
        if ($gambar) {
            $gambarnama = time() . '.' . $gambar->getClientOriginalExtension();
            $request->gambar->move('room', $gambarnama);
            $data->gambar = $gambarnama;
        }
        $data->save();
        return redirect()->back()->with('success', 'Kamar Berhasil Di Tambahkan');
    }


    public function data_kamar()
    {
        $data = Room::all();
        return view('admin.data_kamar', compact('data'));
    }

    public function update_kamar($id)
    {
        $data = Room::find($id);
        return view('admin.update_kamar', compact('data'));
    }

    public function edit_kamar(Request $request, $id)
    {
        $data = Room::find($id);

        $data->nama_kamar = $request->kamar;
        $data->deskripsi = $request->desk;
        $data->harga = $request->harga;
        $data->wifi = $request->wifi;
        $data->type_kamar = $request->type;
        $gambar = $request->gambar;

        if ($gambar) {
            $gambarnama = time() . '.' . $gambar->getClientOriginalExtension();
            $request->gambar->move('room', $gambarnama);
            $data->gambar = $gambarnama;
        }


        $data->save();
        return redirect('data_kamar')->with('success', 'Kamar Berhasil Di Update');
    }

    public function kamar_delete($id)
    {
        $data = Room::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Kamar Berhasil Di Hapus');
    }
}
