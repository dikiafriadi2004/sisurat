<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use App\Models\LaporanPajakHotel;
use App\Models\Tahun;
use App\Models\PajakHotel;
use Illuminate\Http\Request;

class LaporanPajakHotelController extends Controller
{
    public function create(PajakHotel $pajakhotel)
    {
        $bulan = Bulan::orderBy('id')->get();
        $tahun = Tahun::orderBy('id')->get();
        return view('admin.laporan.hotel.create', compact('pajakhotel', 'bulan', 'tahun'));
    }

    public function store(Request $request, PajakHotel $pajakhotel)
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

        LaporanPajakHotel::create([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_setoran' => $request->jumlah_setoran,
            'pajak_hotel_id' => $pajakhotel->id,
            'bukti_laporan' => isset($image_name) ? $image_name : null,
        ]);

        return redirect()->route('hotel.detail', $pajakhotel->id);
    }
}
