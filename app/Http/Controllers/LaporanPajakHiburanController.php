<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use App\Models\LaporanPajakHiburan;
use App\Models\Tahun;
use App\Models\PajakHiburan;
use Illuminate\Http\Request;

class LaporanPajakHiburanController extends Controller
{
    public function create(PajakHiburan $pajakhiburan)
    {
        $bulan = Bulan::orderBy('id')->get();
        $tahun = Tahun::orderBy('id')->get();
        return view('admin.laporan.hiburan.create', compact('pajakhiburan', 'bulan', 'tahun'));
    }

    public function store(Request $request, PajakHiburan $pajakhiburan)
    {

        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'jumlah_setoran' => 'required',
            'bukti_laporan' => 'image|mimes:png,jpg,jpeg|max:10240'
        ]);

        if ($request->hasFile('bukti_laporan')) {
            $image = $request->file('bukti_laporan');
            $image_name = time() . "_" . $image->getClientOriginalName();
            $destination_path = public_path(getenv('CUSTOM_UPLOAD_LOCATION'));
            $image->move($destination_path, $image_name);
        }

        LaporanPajakHiburan::create([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_setoran' => $request->jumlah_setoran,
            'pajak_hiburan_id' => $pajakhiburan->id,
            'bukti_laporan' => isset($image_name) ? $image_name : null,
        ]);

        return redirect()->route('hiburan.detail', $pajakhiburan->id);
    }
}
