<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;

    public static function getAll()
    {
        $url = "https://jsonplaceholder.typicode.com/posts";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            curl_close($ch);
            exit;
        }

        curl_close($ch);

        // Dekode JSON menjadi array PHP
        $data = json_decode($response, true);

        return $data;
    }

    public static function getPostById($id)
    {
        $url = "https://jsonplaceholder.typicode.com/posts/" . $id;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            curl_close($ch);
            exit;
        }

        curl_close($ch);

        // Dekode JSON menjadi array PHP
        $data = json_decode($response, true);

        return $data;
    }

    public static function getDogImages()
    {
        // URL API
        $url = "https://dog.ceo/api/breeds/image/random";

        // Array untuk menyimpan URL gambar
        $imageUrls = [];

        // Lakukan loop untuk mendapatkan 6 gambar
        for ($i = 0; $i < 7; $i++) {
            // Inisialisasi cURL
            $ch = curl_init();

            // Setel opsi cURL
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
            ]);

            // Eksekusi permintaan cURL
            $response = curl_exec($ch);

            // Periksa error
            if ($response === false) {
                echo "cURL Error: " . curl_error($ch);
                curl_close($ch);
                exit;
            }

            // Tutup cURL
            curl_close($ch);

            // Decode JSON
            $data = json_decode($response, true);

            // Tambahkan URL gambar ke array jika berhasil diambil
            if (isset($data['message'])) {
                $imageUrls[] = $data['message'];
            }
        }

        // Kembalikan array URL gambar
        return $imageUrls;
    }

    public static function getDogImage()
    {
        // URL API
        $url = "https://dog.ceo/api/breeds/image/random";


        // Inisialisasi cURL
        $ch = curl_init();

        // Setel opsi cURL
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        // Eksekusi permintaan cURL
        $response = curl_exec($ch);

        // Periksa error
        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            curl_close($ch);
            exit;
        }

        // Tutup cURL
        curl_close($ch);

        // Decode JSON
        $data = json_decode($response, true);

        $imageUrl = $data['message'];

        // Kembalikan array URL gambar
        return $imageUrl;
    }

    public static function getPostByUserId($id)
    {
        $url = "https://jsonplaceholder.typicode.com/users/" . $id . "/posts";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Untuk bypass verify (tidak direkomendasikan untuk produksi)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            curl_close($ch);
            exit;
        }

        curl_close($ch);

        // Dekode JSON menjadi array PHP
        $data = json_decode($response, true);

        return $data;
    }

    protected $guarded = ['id'];
    // protected $with = ['category', 'user'];
}
