<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users.index', compact('user'));
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $role = Auth::user()->role;
            return redirect()->route( $role . '.dashboard');
        }else{
            return redirect()->route('login')->with('failed', 'email atau pasword salah!!');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }
    
    public function register()
    {
       return view('users.register');
    }

    // public function registerAuth(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|min:5',
    //         'email' => 'required|email|unique:users,email',
    //         // 'password' => 'required|min:6',
    //         'role' => 'required',
    //     ]);

    //     $password = generatePassword($data['name'], $data['email']);

    //     $user = new User();
    //     $user->name = $data['name'];
    //     $user->email = $data['email'];
    //     $user->password = bcrypt($password);
    //     $user->role = $data['role'];
    //     $user->save();

    //     // $data['name'] = $request->name;
    //     // $data['email'] = $request->email;
    //     // $data['role'] = $request->role;
    //     // $data['password'] = Hash::make($password);

    //     // User::create($data);
    
    //     // $login = [
    //     //     'name' => $request->name,
    //     //     'email' => $request->email,
    //     //     'password' => $password,
    //     //     'role' => $request->role,
    //     // ];
    
    //     if (Auth::attempt($user)) {
    //         $role = Auth::user()->role;
    //         return redirect()->route( $role . '.dashboard');
    //     }else {
    //         return redirect()->route('user.home')->with('failed', 'email atau pasword salah!!');
    //     }
    // }

    // private function generatePassword($name, $email)
    // {
    //     $name = explode(' ', $name);
    //     $email = explode('@', $email);

    //     $password = implode('', array_slice($name, 0, 5)) . implode('', array_slice($email, 0, 3));

    //     return $password;
    // }

    public function registerAuth(Request $request)
    {

        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'password' => '',
            'role' => 'required'

        ]);

        
        $email = $request->email; // Anda harus mengganti ini dengan cara sesuai dengan form Anda
        $username = $request->name; // Anda harus mengganti ini dengan cara sesuai dengan form Anda

        $email_first_3_letters = substr($email, 0, 3);
        $username_first_3_letters = substr($username, 0, 3);
        $password = $email_first_3_letters . $username_first_3_letters;




        user::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role' => $request->role,
        ]);

        return redirect()->route('Admin.user.home')->with('success', 'Berhasil menambahkan data user!');

        // $data = $request->validate([
        //     'name' => 'required|min:5',
        //     'email' => 'required|email|unique:users',
        //     'role' => 'required',
        // ]);

        // $email = $request->email; // Anda harus mengganti ini dengan cara sesuai dengan form Anda
        // $name = $request->name;

    
        // // $password = implode(",", array_slice($data['name'], 0, 5));
        // $email_first_3_letters = substr($email, 0, 3);
        // $username_first_3_letters = substr($name, 0, 3);
        // $password = $username_first_3_letters . $email_first_3_letters;

        // user::create([

        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $password,
        //     'role' => $request->role,
        // ]);

        // return redirect()->route('Admin.user.home')->with('success', 'Berhasil menambahkan data user!');  
    
        // return $this->create($data, $password);

        // $name = $data['name'];
        // $email = $data['email'];
        // // $password = generatePassword($data['name'], $data['email']);
        // $name = explode(' ', $name);
        // $email= explode('@', $email);

        // $password = implode(",", array_slice($data['name'], 0, 5)) . implode('', array_slice($data['email'], 0, 3));
        // $password = implode(",", array_slice($data['name'], 0, 5));
        // $password = implode(",", array_slice($data['name'], 0, 5));


        // dd($password);

        // $user = new User();
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = $password;
        // $user->role = $data['role'];
        // $user->save();

        // $data['name'] = $request->name;
        // $data['email'] = $request->email;
        // $data['role'] = $request->role;
        // $data['password'] = Hash::make($password);

        // User::create($data);
    
        // $login = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $password,
        //     'role' => $request->role,
        // ];

        
        // return redirect()->route('login')->with('success', 'User berhasil ditambahkan');
    }

    private function generatePassword($name, $email)
    {
        $name = explode(' ', $name);
        $email = explode('@', $email);

        $password = implode('', array_slice($name, 0, 5)) . implode('', array_slice($email, 0, 3));

        return $password;
    }

    
}
