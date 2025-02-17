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

    // Surat Pemberitahuan

    public function getsuratpemberitahuan(PajakRestoran $pajakrestoran, LaporanPajakRestoran $laporanpajakrestoran)
    {
        return view('admin.surat.restoran.surat-pemberitahuan', compact('laporanpajakrestoran', 'pajakrestoran'));
    }

    public function suratpemberitahuan(Request $request, LaporanPajakRestoran $laporanpajakrestoran)
    {
        $request->validate([
            'tgl_surat_pemberitahuan' => 'required',
        ]);

        $laporanpajakrestoran->update([
            'tgl_surat_pemberitahuan' => $request->tgl_surat_pemberitahuan
        ]);

        return redirect()->route('restoran.detail', $laporanpajakrestoran->pajak_restoran_id)->with('success', 'Surat Pemberitahuan Restoran Berhasil dibuat');
    }

    public function downloadsuratpemberitahuan(Request $request, $id)
    {
        $pajakrestoran = PajakRestoran::find($id);
        $laporanpajakrestoran = LaporanPajakRestoran::find($id);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat/restoran/surat_pemberitahuan.docx', true);

        $nama_pemilik = $request->nama_pemilik;
        $nama_usaha = $request->nama_usaha;
        $alamat_usaha = $request->alamat_usaha;
        $tgl_surat_pemberitahuan = $laporanpajakrestoran->tgl_surat_pemberitahuan;

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

        return view('admin.surat.restoran.download-surat-pemberitahuan', compact('pajakrestoran', 'laporanpajakrestoran'));
    }


    // Surat Teguran

    public function getsuratteguran(PajakRestoran $pajakrestoran, LaporanPajakRestoran $laporanpajakrestoran)
    {
        return view('admin.surat.restoran.surat-teguran', compact('laporanpajakrestoran', 'pajakrestoran'));
    }

    public function suratteguran(Request $request, LaporanPajakRestoran $laporanpajakrestoran)
    {
        $request->validate([
            'tgl_surat_teguran' => 'required',
        ]);

        $laporanpajakrestoran->update([
            'tgl_surat_teguran' => $request->tgl_surat_teguran
        ]);

        return redirect()->route('restoran.detail', $laporanpajakrestoran->pajak_restoran_id)->with('success', 'Surat Teguran Restoran Berhasil dibuat');
    }

    public function downloadsuratteguran(Request $request, $id)
    {
        $pajakrestoran = PajakRestoran::find($id);
        $laporanpajakrestoran = LaporanPajakRestoran::find($id);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat/restoran/surat_teguran.docx', true);

        $nama_pemilik = $request->nama_pemilik;
        $nama_usaha = $request->nama_usaha;
        $alamat_usaha = $request->alamat_usaha;
        $tgl_surat_teguran = $laporanpajakrestoran->tgl_surat_teguran;

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

        return view('admin.surat.restoran.download-surat-teguran', compact('pajakrestoran', 'laporanpajakrestoran'));
    }

}
