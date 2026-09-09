<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // GET /api/bookings  atau  /api/bookings?akun=USERNAME
    public function index(Request $request)
    {
        $query = Booking::query()->orderByDesc('created_at');
        if ($request->has('akun')) {
            $query->where('akun', $request->query('akun'));
        }
        return response()->json($query->get());
    }

    // POST /api/bookings
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string',
            'akun' => 'required|string',
            'nama' => 'required|string',
            'instansi' => 'required|string',
            'jenjang' => 'nullable|string',
            'keperluan' => 'required|string',
            'tanggal_usulan' => 'required|string',
            'jam_usulan' => 'required|string',
        ]);

        $data['status'] = 'Menunggu Konfirmasi';
        $data['catatan_petugas'] = '';
        $data['created_at'] = now();

        $booking = Booking::create($data);
        return response()->json($booking, 201);
    }

    // PUT /api/bookings/{id}
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['error' => 'Booking tidak ditemukan.'], 404);
        }
        $data = $request->validate([
            'status' => 'sometimes|string',
            'catatan_petugas' => 'sometimes|string',
        ]);
        $booking->update($data);
        return response()->json($booking);
    }
}
