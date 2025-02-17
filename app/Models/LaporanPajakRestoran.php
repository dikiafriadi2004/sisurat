<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPajakRestoran extends Model
{
    protected $table = 'laporan_pajak_restoran';

    protected $fillable = [
        'bulan',
        'tahun',
        'jumlah_setoran',
        'bukti_laporan',
        'pajak_restoran_id',
        'tgl_surat_pemberitahuan',
        'tgl_surat_teguran'
    ];

    public function pajakrestoran()
    {
        return $this->belongsTo(PajakRestoran::class);
    }

    public function bulan()
    {
        return $this->belongsTo(Bulan::class);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

}
