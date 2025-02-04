<?php

namespace App\Http\Controllers;

use App\Models\PajakHiburan;
use Illuminate\Http\Request;

class PajakHiburanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $pajakhiburan = PajakHiburan::where(function ($query) use ($search) {
            if ($search) {
                $query->where('nama_pemilik', 'like', "%{$search}%")->orWhere('nama_usaha', 'like', "%{$search}%");
            }
        })->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin.hiburan.index', compact('pajakhiburan'));
    }

    public function create()
    {
        return view('admin.hiburan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npwpd' => 'required|min:3',
            'nama_pemilik' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
        ]);

        PajakHiburan::create([
            'npwpd' => $request->npwpd,
            'nama_pemilik' => $request->nama_pemilik,
            'nama_usaha' => $request->nama_usaha,
            'alamat_usaha' => $request->alamat_usaha,
        ]);

        return redirect()->route('hiburan.index')->with('success', 'Pajak Hiburan berhasil disimpan');
    }

    public function edit($id)
    {
        $pajakhiburan = PajakHiburan::find($id);
        return view('admin.hiburan.edit', compact('pajakhiburan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
        ]);

        $pajakhiburan = PajakHiburan::findOrFail($id);

        $pajakhiburan->update([
            'nama_pemilik' => $request->nama_pemilik,
            'nama_usaha' => $request->nama_usaha,
            'alamat_usaha' => $request->alamat_usaha,
        ]);


        return redirect()->route('hiburan.index')->with('success', 'Data Hiburan berhasil diubah');
    }

    public function destroy($id)
    {
        $pajakhiburan = PajakHiburan::findOrFail($id);
        $pajakhiburan->delete();
        return redirect()->route('hiburan.index')->with('success', 'Data Hiburan berhasil dihapus');
    }
}
