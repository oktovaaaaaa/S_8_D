<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(6);

        return view('menus.tampilan', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        menu::create([
            'nama' => $request->nama,
            'harga' => str_replace(".", "", $request->harga),
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName()
        ]);

        return redirect()->route('menus.tampilan')->with('success', 'Add menu Success');
    }
    
    public function edit(menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, menu $menu)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required|numeric',
        ]);

        // dd(str_replace(".", "", $request->harga));

        $menu->nama = $request->nama;
        $menu->harga = str_replace(".", "", $request->harga);
        $menu->deskripsi = $request->deskripsi;

        if ($request->file('foto')) {

            if ($menu->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $menu->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $menu->foto = $foto->hashName();
        }

        $menu->update();

        return redirect()->route('menus.tampilan')->with('success', 'Update menu Success');
    }

    public function destroy(menu $menu)
    {
        if ($menu->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $menu->foto);
        }

        $menu->delete();

        return redirect()->route('menus.tampilan')->with('success', 'Delete menu Success');
    }
}
