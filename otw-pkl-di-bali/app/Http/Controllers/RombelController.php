<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombel::all();
        return view('rombels.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rombels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required',
            ]);

            Rombel::create([
            'rombel' => $request->rombel,
            ]);
            // atau jika seluruh data input akan dimasukkan langsung ke db bisa dengan perintah Medicine::create($request->all());
            return redirect()->route('Admin.rombel.home')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombel $rombel, $id)
    {
        $rombel = Rombel::find($id);
        return view('rombels.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rombel' => 'required',
        ]);
        Rombel::where('id', $id) -> update([
            'rombel' => $request->rombel,
        ]);
            return redirect()->route('Admin.rombel.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rombel $rombel, $id)
    {
        rombel::where('id', $id)->delete();

        return redirect()->route('Admin.rombel.home')->with('deleted', 'Berhasil menghapus data!');
    }
}
