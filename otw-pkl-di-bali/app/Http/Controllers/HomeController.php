<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        $role = Auth::user()->role;
        $rayon = Rayon::count();
        $ps = User::where('role', 'PembimbingSiswa')->count();
        $admin = User::where('role', 'Admin')->count();
        $rombel = Rombel::count();
        $student = Students::count();
        return view('dashboard', compact('rayon','rombel','student','ps','admin','role'));
    }
}