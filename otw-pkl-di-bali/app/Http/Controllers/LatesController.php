<?php

namespace App\Http\Controllers;

use App\Models\Lates;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Students::all();
        // $id = $lates->pluck('id')->toArray();
        // foreach ($id as $ids) {
        //     return $ids;
        //         }
            // dd($lates);
        // $jumlah = Lates::whereIn('student_id', $id)->count();
        $role = Auth::User()->role;
        return view('lates.index', compact('lates', 'role'));
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::all();
        $role = Auth::user()->role;
        return view('lates.create', compact('students', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $bukti = $request->file('bukti');
        $bukti->storeAs('public/posts', $bukti->hashName());
        // $filename = date('Y-m-d').$bukti->getClientOriginalName();
        // $path = 'photo-user/'.$filename;

        // storage::disk('public')->put($path,file_get_contents($bukti));

        Lates::create([
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $bukti->hashName(),
        ]);
        $role = Auth::user()->role;
            // atau jika seluruh data input akan dimasukkan langsung ke db bisa dengan perintah Medicine::create($request->all());
        return redirect()->route( $role . '.lates.show')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $lates = Lates::with('students')->latest()->get();
        $role = Auth::User()->role;
        return view('lates.detail', compact('lates', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lates $lates, $id)
    {
        $students = Students::all();
        $lates = Lates::find($id);
        $role = Auth::user()->role;
        return view('lates.edit', compact('lates', 'students', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            // 'bukti' => 'required',
        ]);

        Lates::where('id', $id) -> update([
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            // 'bukti' => $request->bukti,
        ]);
        $role = Auth::user()->role;
        return redirect()->route( $role . '.lates.show')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lates $lates, $id)
    {
        $role = Auth::user()->role;
        Lates::where('id', $id)->delete();

        return redirect()->route( $role . '.lates.show')->with('deleted', 'Berhasil menghapus data!');
    }
}
