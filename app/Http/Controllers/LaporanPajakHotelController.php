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

    // Surat Pemberitahuan

    public function getsuratpemberitahuan(PajakHotel $pajakhotel, LaporanPajakHotel $laporanpajakhotel)
    {
        return view('admin.surat.hotel.surat-pemberitahuan', compact('laporanpajakhotel', 'pajakhotel'));
    }

    public function suratpemberitahuan(Request $request, LaporanPajakHotel $laporanpajakhotel)
    {
        $request->validate([
            'tgl_surat_pemberitahuan' => 'required',
        ]);

        $laporanpajakhotel->update([
            'tgl_surat_pemberitahuan' => $request->tgl_surat_pemberitahuan
        ]);

        return redirect()->route('hotel.detail', $laporanpajakhotel->pajak_hotel_id)->with('success', 'Surat Pemberitahuan Hotel Berhasil dibuat');
    }

    public function downloadsuratpemberitahuan(Request $request, $id)
    {
        $pajakhotel = PajakHotel::find($id);
        $laporanpajakhotel = LaporanPajakHotel::find($id);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat/hotel/surat_pemberitahuan.docx', true);

        $nama_pemilik = $request->nama_pemilik;
        $nama_usaha = $request->nama_usaha;
        $alamat_usaha = $request->alamat_usaha;
        $tgl_surat_pemberitahuan = $laporanpajakhotel->tgl_surat_pemberitahuan;

        $templateProcessor->setValues(
            [
                'nama_pemilik' => $nama_pemilik,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
                'tgl_surat_pemberitahuan' => $tgl_surat_pemberitahuan
            ]
        );

        $pathToSave = $nama_pemilik . '_' . $tgl_surat_pemberitahuan . '_' . 'surat_pemberitahuan.docx';
        $templateProcessor->saveAs($pathToSave);

        header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachement;filename="' . $pathToSave . '"');

        readfile($pathToSave);
        unlink($pathToSave);

        return view('admin.surat.hotel.download-surat-pemberitahuan', compact('pajakhotel', 'laporanpajakhotel'));
    }


    // Surat Teguran

    public function getsuratteguran(PajakHotel $pajakhotel, LaporanPajakHotel $laporanpajakhotel)
    {
        return view('admin.surat.hotel.surat-teguran', compact('laporanpajakhotel', 'pajakhotel'));
    }

    public function suratteguran(Request $request, LaporanPajakHotel $laporanpajakhotel)
    {
        $request->validate([
            'tgl_surat_teguran' => 'required',
        ]);

        $laporanpajakhotel->update([
            'tgl_surat_teguran' => $request->tgl_surat_teguran
        ]);

        return redirect()->route('hotel.detail', $laporanpajakhotel->pajak_hotel_id)->with('success', 'Surat Teguran Hotel Berhasil dibuat');
    }

    public function downloadsuratteguran(Request $request, $id)
    {
        $pajakhotel = PajakHotel::find($id);
        $laporanpajakhotel = LaporanPajakHotel::find($id);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat/hotel/surat_teguran.docx', true);

        $nama_pemilik = $request->nama_pemilik;
        $nama_usaha = $request->nama_usaha;
        $alamat_usaha = $request->alamat_usaha;
        $tgl_surat_teguran = $laporanpajakhotel->tgl_surat_teguran;

        $templateProcessor->setValues(
            [
                'nama_pemilik' => $nama_pemilik,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
                'tgl_surat_teguran' => $tgl_surat_teguran
            ]
        );

        $pathToSave = $nama_pemilik . '_' . $tgl_surat_teguran . '_' . 'surat_teguran.docx';
        $templateProcessor->saveAs($pathToSave);

        header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachement;filename="' . $pathToSave . '"');

        readfile($pathToSave);
        unlink($pathToSave);

        return view('admin.surat.hotel.download-surat-teguran', compact('pajakhotel', 'laporanpajakhotel'));
    }



}
