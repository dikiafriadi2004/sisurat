<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PajakHotel extends Model
{
    use HasFactory;

    protected $table = 'pajak_hotel';

    protected $fillable = [
        'npwpd',
        'nama_pemilik',
        'slug',
        'no_hp',
        'nama_usaha',
        'alamat_usaha',
        'tgl_surat_pemberitahuan',
        'tgl_surat_teguran'
    ];

    public function laporan_pajak_hotel()
    {
        return $this->hasMany(LaporanPajakHotel::class);
    }
}
