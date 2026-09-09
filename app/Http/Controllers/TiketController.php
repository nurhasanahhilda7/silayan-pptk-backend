<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    // GET /api/tikets  atau  /api/tikets?akun=USERNAME (untuk riwayat tamu tertentu)
    public function index(Request $request)
    {
        $query = Tiket::query()->orderByDesc('created_at');
        if ($request->has('akun')) {
            $query->where('akun', $request->query('akun'));
        }
        return response()->json($query->get());
    }

    // POST /api/tikets
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string',
            'akun' => 'required|string',
            'nama' => 'required|string',
            'hp' => 'required|string',
            'instansi' => 'required|string',
            'jenjang' => 'nullable|string',
            'jenis' => 'required|string',
            'berkas' => 'nullable|string',
            'lampiran' => 'nullable',
            'keperluan' => 'required|string',
            'tanggal' => 'required|string',
        ]);

        $data['status'] = 'Menunggu Verifikasi';
        $data['catatan'] = '';
        $data['created_at'] = now();
        if (isset($data['lampiran']) && is_array($data['lampiran'])) {
            $data['lampiran'] = json_encode($data['lampiran']);
        }

        $tiket = Tiket::create($data);
        return response()->json($tiket, 201);
    }

    // PUT /api/tikets/{id}
    public function update(Request $request, $id)
    {
        $tiket = Tiket::find($id);
        if (!$tiket) {
            return response()->json(['error' => 'Tiket tidak ditemukan.'], 404);
        }
        $data = $request->validate([
            'status' => 'sometimes|string',
            'catatan' => 'sometimes|string',
        ]);
        $tiket->update($data);
        return response()->json($tiket);
    }
}
