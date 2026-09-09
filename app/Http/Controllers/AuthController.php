<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $akun = Akun::find($data['username']);

        if (!$akun) {
            return response()->json(['error' => 'Akun tidak ditemukan.'], 404);
        }
        if ($akun->password !== $data['password']) {
            return response()->json(['error' => 'Kata sandi salah.'], 401);
        }

        return response()->json($akun);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6',
            'nama' => 'required|string',
            'email' => 'nullable|string',
        ]);

        $existing = Akun::find($data['username']);
        if ($existing) {
            return response()->json(['error' => 'Nomor HP ini sudah terdaftar.'], 409);
        }

        $akun = Akun::create([
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => 'tamu',
            'nama' => $data['nama'],
            'email' => $data['email'] ?? '',
        ]);

        return response()->json($akun, 201);
    }

    public function getAkun($username)
    {
        $akun = Akun::find($username);
        if (!$akun) {
            return response()->json(['error' => 'Akun tidak ditemukan.'], 404);
        }
        return response()->json($akun);
    }
}
