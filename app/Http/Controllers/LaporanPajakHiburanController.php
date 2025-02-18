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

    // Surat Pemberitahuan

    public function getsuratpemberitahuan(PajakHiburan $pajakhiburan, LaporanPajakHiburan $laporanpajakhiburan)
    {
        return view('admin.surat.hiburan.surat-pemberitahuan', compact('laporanpajakhiburan', 'pajakhiburan'));
    }

    public function suratpemberitahuan(Request $request, LaporanPajakHiburan $laporanpajakhiburan)
    {
        $request->validate([
            'tgl_surat_pemberitahuan' => 'required',
        ]);

        $laporanpajakhiburan->update([
            'tgl_surat_pemberitahuan' => $request->tgl_surat_pemberitahuan
        ]);

        return redirect()->route('hiburan.detail', $laporanpajakhiburan->pajak_hiburan_id)->with('success', 'Surat Pemberitahuan Hiburan Berhasil dibuat');
    }

    public function downloadsuratpemberitahuan(Request $request, $id)
    {
        $pajakhiburan = PajakHiburan::find($id);
        $laporanpajakhiburan = LaporanPajakHiburan::find($id);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat/hiburan/surat_pemberitahuan.docx', true);

        $nama_pemilik = $request->nama_pemilik;
        $nama_usaha = $request->nama_usaha;
        $alamat_usaha = $request->alamat_usaha;
        $tgl_surat_pemberitahuan = $laporanpajakhiburan->tgl_surat_pemberitahuan;

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

        return view('admin.surat.hiburan.download-surat-pemberitahuan', compact('pajakhiburan', 'laporanpajakhiburan'));
    }


    // Surat Teguran

    public function getsuratteguran(PajakHiburan $pajakhiburan, LaporanPajakHiburan $laporanpajakhiburan)
    {
        return view('admin.surat.hiburan.surat-teguran', compact('laporanpajakhiburan', 'pajakhiburan'));
    }

    public function suratteguran(Request $request, LaporanPajakHiburan $laporanpajakhiburan)
    {
        $request->validate([
            'tgl_surat_teguran' => 'required',
        ]);

        $laporanpajakhiburan->update([
            'tgl_surat_teguran' => $request->tgl_surat_teguran
        ]);

        return redirect()->route('hiburan.detail', $laporanpajakhiburan->pajak_hiburan_id)->with('success', 'Surat Teguran hiburan Berhasil dibuat');
    }

    public function downloadsuratteguran(Request $request, $id)
    {
        $pajakhiburan = PajakHiburan::find($id);
        $laporanpajakhiburan = LaporanPajakHiburan::find($id);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat/hiburan/surat_teguran.docx', true);

        $nama_pemilik = $request->nama_pemilik;
        $nama_usaha = $request->nama_usaha;
        $alamat_usaha = $request->alamat_usaha;
        $tgl_surat_teguran = $laporanpajakhiburan->tgl_surat_teguran;

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

        return view('admin.surat.hiburan.download-surat-teguran', compact('pajakhiburan', 'laporanpajakhiburan'));
    }
}
