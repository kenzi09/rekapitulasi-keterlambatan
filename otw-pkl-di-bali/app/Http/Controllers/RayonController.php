<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::with('user')->latest()->get();
        return view('rayons.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role', 'PembimbingSiswa')->get();
        return view('rayons.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'ps_rayon' => 'required',
            ]);

            Rayon::create([
            'rayon' => $request->rayon,
            'ps_rayon' => $request->ps_rayon,
            ]);
            // atau jika seluruh data input akan dimasukkan langsung ke db bisa dengan perintah Medicine::create($request->all());
            return redirect()->route('Admin.rayon.index')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayon $rayon, $id)
    {
        $user = User::where('role', 'PembimbingSiswa')->get();
        $rayon = Rayon::find($id);
        return view('rayons.edit', compact('rayon', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required',
            'ps_rayon' => 'required',
        ]);
        Rayon::where('id', $id) -> update([
            'rayon' => $request->rayon,
            'ps_rayon' => $request->ps_rayon,
        ]);
            return redirect()->route('Admin.rayon.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon, $id)
    {
        rayon::where('id', $id)->delete();

        return redirect()->route('Admin.rayon.index')->with('deleted', 'Berhasil menghapus data!');
    }

    
    // public function search(Request $request)
    // {
    //     $search = $request->search;

    //     $posts =Post::where(function($query) use ($search){
    //         $query->where('rayon', 'like', "%search%")
    //         ->orWhere('ps_rayon', 'like', "%search%");
    //     });

    //     return view('rayons.index', compact('posts', 'search'));

    // }
}
