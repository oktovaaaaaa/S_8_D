<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use Illuminate\Http\Request;

class AdminKontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::all();
        return view('kontaks.tampilan', compact('kontaks'));
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();
        return redirect()->route('kontaks.tampilan')->with('success', 'Pesan berhasil di hapus!');
    }
}
