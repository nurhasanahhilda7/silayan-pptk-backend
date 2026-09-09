<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id', 'akun', 'nama', 'instansi', 'jenjang', 'keperluan',
        'tanggal_usulan', 'jam_usulan', 'status', 'catatan_petugas', 'created_at'
    ];
}
