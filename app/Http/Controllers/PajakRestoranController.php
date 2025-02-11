<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PajakRestoran;

class PajakRestoranController extends Controller
{
    public function index (Request $request)
    {
        $search = $request->search;
        $pajakrestoran = PajakRestoran::where(function ($query) use ($search) {
            if ($search) {
                $query->where('nama_pemilik', 'like', "%{$search}%")->orWhere('nama_usaha', 'like', "%{$search}%");
            }
        })->orderBy('id', 'desc')->paginate(10)->withQueryString();

        // Script Word

        return view('admin.restoran.index', compact('pajakrestoran'));
    }

    public function create ()
    {
        return view('admin.restoran.create');
    }

    public function store (Request $request)
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
            'slug' => Str::slug($request->nama_pemilik . '-'. Str::random(5)),
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

}
