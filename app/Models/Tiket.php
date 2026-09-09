<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tikets';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id', 'akun', 'nama', 'hp', 'instansi', 'jenjang', 'jenis',
        'berkas', 'lampiran', 'keperluan', 'tanggal', 'status', 'catatan', 'created_at'
    ];
}
