<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPajakHiburan extends Model
{

    protected $table = 'laporan_pajak_hiburan';

    protected $fillable = [
        'bulan',
        'tahun',
        'jumlah_setoran',
        'bukti_laporan',
        'pajak_hiburan_id',
        'tgl_surat_pemberitahuan',
        'tgl_surat_teguran'
    ];

    public function pajakhiburan()
    {
        return $this->belongsTo(PajakHiburan::class);
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
