<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::with('rayon', 'rombel')->latest()->get();
        $role = Auth::user()->role;
        return view('student.index', compact('students', 'role'));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        $role = Auth::user()->role;
        return view('student.create', compact('rayons', 'rombels', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|min:8',
            'name' => 'required',
            'rayon_id' => 'required',
            'rombel_id' => 'required',
            ]);

            Students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rayon_id' => $request->rayon_id,
            'rombel_id' => $request->rombel_id,
            ]);
            // atau jika seluruh data input akan dimasukkan langsung ke db bisa dengan perintah Medicine::create($request->all());
            $role = Auth::user()->role;
            return redirect()->route( $role . '.student.home')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $student, $id)
    {
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        $student = Students::find($id);
        $role = Auth::user()->role;
        return view('student.edit', compact('student', 'rayons', 'rombels', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rayon_id' => 'required',
            'rombel_id' => 'required',
        ]);
        Students::where('id', $id) -> update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rayon_id' => $request->rayon_id,
            'rombel_id' => $request->rombel_id,
        ]);
        $role = Auth::user()->role;
            return redirect()->route( $role . '.student.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $student, $id)
    {
        students::where('id', $id)->delete();
        $role = Auth::user()->role;

        return redirect()->route( $role . '.student.home')->with('deleted', 'Berhasil menghapus data!');
    }
}
