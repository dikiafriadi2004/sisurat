<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPajakHotel extends Model
{
    protected $table = 'laporan_pajak_hotel';

    protected $fillable = [
        'bulan',
        'tahun',
        'jumlah_setoran',
        'bukti_laporan',
        'pajak_hotel_id',
    ];

    public function pajakhotel()
    {
        return $this->belongsTo(PajakHotel::class);
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
