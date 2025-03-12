<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // URL API
        $url = "https://dummyjson.com/users";

        // Inisialisasi cURL
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Eksekusi cURL dan decode JSON
        $response = curl_exec($ch);
        curl_close($ch);

        $users = json_decode($response, true);

        // dd($users);

        if (isset($users['users'])) {
            // Cari pengguna berdasarkan username dan password
            $user = collect($users['users'])->firstWhere(function ($user) use ($request) {
                return $user['username'] === $request->username && $user['password'] === $request->password;
            });

            if ($user) {
                // Jika pengguna ditemukan, simpan sesi atau token
                session(['user' => $user]);
                return redirect('/dashboard')->with('success', 'Login berhasil!');
            }
        }

        return back()->with([
            'loginError' => 'Incorrect Username Or Password',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        // Hapus semua session
        $request->session()->flush();

        // Redirect ke halaman login atau halaman lain
        return redirect('/login')->with('success', 'You have been logged out successfully!');
    }
}
