<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PajakRestoran;
use PhpOffice\PhpWord\PhpWord;

class PajakRestoranController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $pajakrestoran = PajakRestoran::where(function ($query) use ($search) {
            if ($search) {
                $query->where('nama_pemilik', 'like', "%{$search}%")->orWhere('nama_usaha', 'like', "%{$search}%");
            }
        })->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('admin.restoran.index', compact('pajakrestoran'));
    }

    public function create()
    {
        return view('admin.restoran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npwpd' => 'required|min:3',
            'nama_pemilik' => 'required',
            'no_hp' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
        ]);

        PajakRestoran::create([
            'npwpd' => $request->npwpd,
            'nama_pemilik' => $request->nama_pemilik,
            'slug' => Str::slug($request->nama_pemilik . '-' . Str::random(5)),
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
            'alamat_usaha' => $request->alamat_usaha,
        ]);

        return redirect()->route('restoran.index')->with('success', 'Pajak restoran berhasil disimpan');
    }

    public function show($id)
    {
        $pajakrestoran = PajakRestoran::find($id);
        return view('admin.restoran.detail', compact('pajakrestoran'));
    }

    public function edit($id)
    {
        $pajakrestoran = PajakRestoran::find($id);
        return view('admin.restoran.edit', compact('pajakrestoran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'no_hp' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
        ]);

        $pajakrestoran = PajakRestoran::findOrFail($id);

        $pajakrestoran->update([
            'nama_pemilik' => $request->nama_pemilik,
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
            'alamat_usaha' => $request->alamat_usaha,
        ]);


        return redirect()->route('restoran.index')->with('success', 'Data Restoran berhasil diubah');
    }

    public function destroy($id)
    {
        $pajakrestoran = PajakRestoran::findOrFail($id);
        $pajakrestoran->delete();
        return redirect()->route('restoran.index')->with('success', 'Data Restoran berhasil dihapus');
    }

    public function getbuatsuratpemberitahuan(Request $request, $id)
    {
        $pajakrestoran = PajakRestoran::findOrFail($id);

        return view('admin.surat.restoran.surat-pemberitahuan', compact('pajakrestoran'));
    }

    public function buatsuratpemberitahuan(Request $request, $id)
    {
        $pajakrestoran = PajakRestoran::findOrFail($id);

        $pajakrestoran->update([
            'tgl_surat_pemberitahuan' => $request->tgl_surat_pemberitahuan,
        ]);

        return view('admin.surat.restoran.surat-pemberitahuan', compact('pajakrestoran'));
    }

    public function suratpemberitahuan(Request $request, $id)
    {
        $pajakrestoran = PajakRestoran::findOrFail($id);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat/restoran/surat_pemberitahuan.docx', true);

        $nama_pemilik = $request->nama_pemilik;
        $nama_usaha = $request->nama_usaha;
        $alamat_usaha = $request->alamat_usaha;
        $tgl_surat_pemberitahuan = $request->tgl_surat_pemberitahuan;

        $templateProcessor->setValues(
            [
                'nama_pemilik' => $nama_pemilik,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
                'tgl_surat_pemberitahuan' => $tgl_surat_pemberitahuan
            ]
        );

        $pathToSave = $nama_pemilik . '_' . 'surat_pemberitahuan.docx';
        $templateProcessor->saveAs($pathToSave);

        header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachement;filename="'.$pathToSave.'"');

        readfile($pathToSave);
        unlink($pathToSave);

        return view('admin.surat.restoran.download-surat-pemberitahuan', compact('pajakrestoran'));
    }

    public function getbuatsuratteguran(Request $request, $id)
    {
        $pajakrestoran = PajakRestoran::findOrFail($id);

        return view('admin.surat.restoran.surat-teguran', compact('pajakrestoran'));
    }

    public function buatsuratteguran(Request $request, $id)
    {
        $pajakrestoran = PajakRestoran::findOrFail($id);

        $pajakrestoran->update([
            'tgl_surat_teguran' => $request->tgl_surat_teguran,
        ]);

        return redirect()->route('restoran.index', compact('pajakrestoran'));

    }

    public function suratteguran(Request $request, $id)
    {
        $pajakrestoran = PajakRestoran::findOrFail($id);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat/restoran/surat_teguran.docx', true);

        $nama_pemilik = $request->nama_pemilik;
        $nama_usaha = $request->nama_usaha;
        $alamat_usaha = $request->alamat_usaha;
        $tgl_surat_teguran = $request->tgl_surat_teguran;

        $templateProcessor->setValues(
            [
                'nama_pemilik' => $nama_pemilik,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
                'tgl_surat_teguran' => $tgl_surat_teguran
            ]
        );

        $pathToSave = $nama_pemilik . '_' . 'surat_teguran.docx';
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

        return view('admin.surat.restoran.download-surat-teguran', compact('pajakrestoran'));
    }
}
