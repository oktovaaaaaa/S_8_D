<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $tentangs = Tentang::paginate(6);

        return view('tentangs.tampilan', compact('tentangs'));
    }

    public function create()
    {
        return view('tentangs.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ]);

        tentang::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal
        ]);
        return redirect()->route('tentangs.tampilan')->with('success', 'Menambahkan tentang cafe berhasil!' );
    }

    public function edit(tentang $tentang)
    {
        return view('tentangs.edit', compact('tentang'));
    }

    public function update(Request $request, tentang $tentang )
    {
    $this->validate($request,[
    'judul' =>'required',
    'deskripsi' => 'required',
    'tanggal' => 'nullable|date',
    ]);

    $tentang ->judul = $request->judul;
    $tentang ->deskripsi = $request->deskripsi;
    $tentang->tanggal = $request->tanggal;

    $tentang->update();
return redirect()->route('tentangs.tampilan')->with('succes','Edit tentang cafe berhasil !');
    }
    public function destroy(tentang $tentang)
    {
        $tentang->delete();

        return redirect()->route('tentangs.tampilan')->with('succes','Tentang cafe berhasil dihapus');
    }
}
