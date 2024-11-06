<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'jenis_barang_id',
        'nama_barang',
        'stok',
        'min_stok',
        'user_id',
        'lokasi_barang'
    ];


    public function jenis_barang() {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Mengambil semua record dan mengurutkan berdasarkan bagian numerik dari id
            $lastRecord = static::all()->sortByDesc(function($item) {
                return (int) str_replace('BRG-', '', $item->id);
            })->first();

            // Jika ada data, ambil bagian angka dari ID terakhir, tambahkan 1 dan buat ID baru
            if ($lastRecord) {
                $lastId = (int) str_replace('BRG-', '', $lastRecord->id);
                $model->id = 'BRG-' . ($lastId + 1);
            } else {
                // Jika tidak ada data, mulai dari 1
                $model->id = 'BRG-1';
            }
        });
    }
}
