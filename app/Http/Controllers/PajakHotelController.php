<?php

namespace App\Http\Controllers;

use App\Models\PajakHotel;
use Illuminate\Http\Request;

class PajakHotelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $pajakhotel = PajakHotel::where(function ($query) use ($search) {
            if ($search) {
                $query->where('nama_pemilik', 'like', "%{$search}%")->orWhere('nama_usaha', 'like', "%{$search}%");
            }
        })->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin.hotel.index', compact('pajakhotel'));
    }

    public function create()
    {
        return view('admin.hotel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npwpd' => 'required|min:3',
            'nama_pemilik' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
        ]);

        PajakHotel::create([
            'npwpd' => $request->npwpd,
            'nama_pemilik' => $request->nama_pemilik,
            'nama_usaha' => $request->nama_usaha,
            'alamat_usaha' => $request->alamat_usaha,
        ]);

        return redirect()->route('hotel.index')->with('success', 'Pajak Hotel berhasil disimpan');
    }

    public function edit($id)
    {
        $pajakhotel = PajakHotel::find($id);
        return view('admin.hotel.edit', compact('pajakhotel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'nama_usaha' => 'required',
            'alamat_usaha' => 'required',
        ]);

        $pajakhotel = PajakHotel::findOrFail($id);

        $pajakhotel->update([
            'nama_pemilik' => $request->nama_pemilik,
            'nama_usaha' => $request->nama_usaha,
            'alamat_usaha' => $request->alamat_usaha,
        ]);


        return redirect()->route('hotel.index')->with('success', 'Data Hotel berhasil diubah');
    }

    public function destroy($id)
    {
        $pajakhotel = PajakHotel::findOrFail($id);
        $pajakhotel->delete();
        return redirect()->route('hotel.index')->with('success', 'Data Hotel berhasil dihapus');
    }
}
