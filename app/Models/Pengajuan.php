<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Mengambil semua record dan mengurutkan berdasarkan bagian numerik dari id
            $lastRecord = static::all()->sortByDesc(function($item) {
                return (int) str_replace('PGJ-', '', $item->id);
            })->first();

            // Jika ada data, ambil bagian angka dari ID terakhir, tambahkan 1 dan buat ID baru
            if ($lastRecord) {
                $lastId = (int) str_replace('PGJ-', '', $lastRecord->id);
                $model->id = 'PGJ-' . ($lastId + 1);
            } else {
                // Jika tidak ada data, mulai dari 1
                $model->id = 'PGJ-1';
            }
        });
    }

    public function jenis_barang() {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }
}
