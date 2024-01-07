<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',
            ]);

            $data['password'] = Hash::check($request->password);

            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            ]);
            // atau jika seluruh data input akan dimasukkan langsung ke db bisa dengan perintah Medicine::create($request->all());
            return redirect()->route('Admin.user.home')->with('success', 'Berhasil menambahkan data!');
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => '',

        ]);


        $email = $request->email; // Anda harus mengganti ini dengan cara sesuai dengan form Anda
        $username = $request->name; // Anda harus mengganti ini dengan cara sesuai dengan form Anda

        $email_first_3_letters = substr($email, 0, 3);
        $username_first_3_letters = substr($username, 0, 3);
        $password = $email_first_3_letters . $username_first_3_letters;


        user::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $password,

        ]);

        return redirect()->route('Admin.user.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        user::where('id', $id)->delete();

        return redirect()->route('Admin.user.home')->with('deleted', 'Berhasil menghapus data!');
    }
}
