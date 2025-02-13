<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakRestoran extends Model
{
    use HasFactory;

    protected $table = 'pajak_restoran';

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

    public function laporan_pajak_restoran()
    {
        return $this->hasMany(LaporanPajakRestoran::class);
    }
}
