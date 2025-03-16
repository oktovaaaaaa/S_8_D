<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;


class AdminTestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::all();
        return view('testimonis.tampilan', compact('testimonis'));

    }

    public function destroy(Testimoni $testimoni)
    {

        $testimoni->delete();
        return redirect()->route('testimonis.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
