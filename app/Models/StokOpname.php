<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokOpname extends Model
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
                return (int) str_replace('SO-', '', $item->id);
            })->first();

            // Jika ada data, ambil bagian angka dari ID terakhir, tambahkan 1 dan buat ID baru
            if ($lastRecord) {
                $lastId = (int) str_replace('SO-', '', $lastRecord->id);
                $model->id = 'SO-' . ($lastId + 1);
            } else {
                // Jika tidak ada data, mulai dari 1
                $model->id = 'SO-1';
            }
        });
    }


    public function barang() {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
