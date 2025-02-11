<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PajakHiburan extends Model
{
    use HasFactory;

    protected $table = 'pajak_hiburan';

    protected $fillable = [
        'npwpd',
        'nama_pemilik',
        'slug',
        'no_hp',
        'nama_usaha',
        'alamat_usaha',
    ];

    public function laporan_pajak_hiburan()
    {
        return $this->hasMany(LaporanPajakHiburan::class);
    }
}
