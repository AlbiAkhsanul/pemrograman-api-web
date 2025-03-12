<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = session('user'); // Ambil data user dari session
        $id = $user['id'];

        $title = 'Dashboard';
        $data = User::getUserById($id);
        return view('dashboard.dashboard', [
            'title' => $title,
            'data' => $data,
        ]);
    }
}
