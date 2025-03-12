<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('user'); // Ambil data user dari session
        $id = $user['id'];
        $data = Post::getPostByUserId($id);
        return view('dashboard.posts.index', [
            'title' => 'My Posts',
            'data' => $data,
            // 'posts' => Post::where('user_id', auth()->user()->id)->orderBy('title')->get()->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dogImage = Post::getDogImage();
        return view('dashboard.posts.create', [
            'title' => 'New Post',
            'imageUrl' => $dogImage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = session('id'); // Mengambil data 'id' dari session

        // URL API
        $url = "https://jsonplaceholder.typicode.com/posts";

        // Data yang akan dikirim
        $postData = [
            "userid" => $id,
            "title" => $request['title'],
            "body" => $request['body'],
        ];

        // dd($postData);

        // Inisialisasi cURL
        $ch = curl_init();

        // Setel opsi cURL
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData)); // Konversi array ke JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        // Eksekusi permintaan cURL
        $response = curl_exec($ch);

        // Ambil kode status HTTP
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Periksa apakah cURL berhasil
        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            curl_close($ch);
            exit;
        }

        // Tutup cURL
        curl_close($ch);

        // Decode respons API
        $responseData = json_decode($response, true);

        // Periksa status code
        if ($httpCode === 201) {
            // Status sukses
            // echo "Data berhasil ditambahkan!<br>";
            // echo "Response dari API:<br>";
            // echo "UserID: " . $responseData['userid'] . "<br>";
            // echo "Title: " . $responseData['title'] . "<br>";
            // echo "Body: " . $responseData['body'] . "<br>";
            // echo "ID: " . $responseData['id'] . "<br>";
            return redirect('/dashboard/posts')->with('success', 'Succesfully Added A New Post! [' . $httpCode . ']');
        } else {
            // Status gagal
            // echo "Gagal menambahkan data. Status code: " . $httpCode;
            return redirect('/dashboard/posts')->with('failed', 'Failed to add a new post! [' . $httpCode . ']');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::getPostById($id);
        $imageUrl = Post::getDogImage();
        $userId = $data['userId'];
        $user = User::getUserById($userId);
        $name = $user['name'];
        $title = $data['title'];
        return view('dashboard.posts.show', [
            'title' => $title,
            'data' => $data,
            'name' => $name,
            'imageUrl' => $imageUrl
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Post::getPostById($id);
        $imageUrl = Post::getDogImage();
        return view('dashboard.posts.edit', [
            'title' => 'Edit Post',
            'data' => $data,
            'imageUrl' => $imageUrl
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userId = session('id'); // Mengambil data 'id' dari session

        // URL API
        $url = "https://jsonplaceholder.typicode.com/posts/" . $id;

        // Data yang akan dikirim
        $putData = [
            "userid" => $userId,
            "title" => $request['title'],
            "body" => $request['body'],
        ];

        // dd($putData);

        // Inisialisasi cURL
        $ch = curl_init();

        // Setel opsi cURL
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');;
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($putData)); // Konversi array ke JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        // Eksekusi permintaan cURL
        $response = curl_exec($ch);

        // Ambil kode status HTTP
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Periksa apakah cURL berhasil
        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            curl_close($ch);
            exit;
        }

        // Tutup cURL
        curl_close($ch);

        // Decode respons API
        $responseData = json_decode($response, true);

        // Periksa status code
        if ($httpCode === 200) {
            // Status sukses
            // echo "Data berhasil ditambahkan!<br>";
            // echo "Response dari API:<br>";
            // echo "UserID: " . $responseData['userid'] . "<br>";
            // echo "Title: " . $responseData['title'] . "<br>";
            // echo "Body: " . $responseData['body'] . "<br>";
            // echo "ID: " . $responseData['id'] . "<br>";
            return redirect('/dashboard/posts')->with('success', 'Succesfully Updated! [' . $httpCode . ']');
        } else {
            // Status gagal
            // echo "Gagal menambahkan data. Status code: " . $httpCode;
            return redirect('/dashboard/posts')->with('failed', 'Failed To Update! [' . $httpCode . ']');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // URL API
        $url = "https://jsonplaceholder.typicode.com/posts/" . $id;

        // Inisialisasi cURL
        $ch = curl_init();

        // Setel opsi cURL
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Gunakan metode DELETE
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
        ]);

        // Eksekusi permintaan cURL
        $response = curl_exec($ch);

        // Ambil kode status HTTP
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Periksa apakah cURL berhasil
        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            curl_close($ch);
            exit;
        }

        // Tutup cURL
        curl_close($ch);

        // Periksa status code
        if ($httpCode === 200) {
            return redirect('/dashboard/posts')->with('success', 'Successfully Deleted! [' . $httpCode . ']');
        } else {
            return redirect('/dashboard/posts')->with('failed', 'Failed to Delete! [' . $httpCode . ']');
        }
    }
}
