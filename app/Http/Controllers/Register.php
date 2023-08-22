<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;


class Register extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:5|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:15|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'required'
        ]);
        // return $request->all();

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        Alert::success('Success', 'Berhasil Membuat Akun');

        return view('auth/login');
    }
}
