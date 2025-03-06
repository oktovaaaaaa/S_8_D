<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class UserMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('userr.menu', compact('menus'));
    }
}
