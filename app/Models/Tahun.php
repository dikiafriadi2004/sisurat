<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tahun extends Model
{
    use HasFactory;

    protected $table = 'tahun';

    protected $fillable = [
        'nama_tahun'
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
