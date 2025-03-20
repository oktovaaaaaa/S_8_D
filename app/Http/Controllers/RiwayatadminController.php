<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\User; // Import model User

class RiwayatadminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Pesanan::query();

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhere('daftar_menu', 'LIKE', '%' . $search . '%');
        }

        $semuaRiwayatPesanan = $query->with('user')->get();

        return view('riwayat.tampilan', compact('semuaRiwayatPesanan'));
    }
}
