<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    use HasFactory;

    protected $table = 'bulan';

    protected $fillable = [
        'nama_bulan'
    ];

    public function laporanPajakRestoran()
    {
        return $this->hasMany(LaporanPajakRestoran::class);
    }

    public function laporanPajakHotel()
    {
        return $this->hasMany(LaporanPajakHotel::class);
    }

    public function laporanPajakHiburan()
    {
        return $this->hasMany(LaporanPajakHiburan::class);
    }
}
