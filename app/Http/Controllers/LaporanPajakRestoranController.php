<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use App\Models\LaporanPajakRestoran;
use App\Models\PajakRestoran;
use App\Models\Tahun;
use Illuminate\Http\Request;

class LaporanPajakRestoranController extends Controller
{
    public function create(PajakRestoran $pajakrestoran)
    {
        // $pajakrestoran = PajakRestoran::find($id);
        $bulan = Bulan::orderBy('id')->get();
        $tahun = Tahun::orderBy('id')->get();
        return view('admin.laporan.restoran.create', compact('pajakrestoran', 'bulan', 'tahun'));
    }

    public function store(Request $request, PajakRestoran $pajakrestoran)
    {
        // $pajakrestoran = PajakRestoran::find($id);

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

        LaporanPajakRestoran::create([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_setoran' => $request->jumlah_setoran,
            'pajak_restoran_id' => $pajakrestoran->id,
            'bukti_laporan' => isset($image_name) ? $image_name : null,
        ]);

        return redirect()->route('restoran.detail', $pajakrestoran->id);
    }
}
