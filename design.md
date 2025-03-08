# **Website Memanggil Public API untuk tugas Pemrograman API B081**

Website yang dibuat adalah simulasi website media sosial untuk sharing postingan bertama anjing, untuk data postingan dan komentar akan diambil dari public api https://jsonplaceholder.typicode.com sedangkan untuk gambar postingan akan diambil dari https://dog.ceo/api/breeds/image/random. Selain itu terdapat beberapa fitur secondary seperti auto assign gender ke user berdasarkan nama mereka menggunakan api https://api.genderize.io/, foto profile random menggunakan api http://source.unsplash.com/, dan Mungkin akan menambahkan fitur auto assign asal negara user berdasarkan nama mereka menggunakan api https://api.nationalize.io/. Pada website ini juga akan terdapat fitur authentikasi yang direncakan menggunakan public api.

---

## **View Overview**
Beberapa tampilan view dan deskripsinya.

### **1. Halaman Utama**
Menampilkan feed postingan dari API (Judul, konten, gambar anjing random)
### **2. Halaman Detail Postingan**
Menampilkan detail postingan dan juga komentar yang ada di postingan ini
### **3. Halaman Profile**
Menampilkan informasi mengenai pengguna
### **4. Halaman Tambah Postingan Baru**
Berupa form untuk membuat postingan baru, saat postingan disubmbit tambahkan gambar anjing secara otomatis
### **5. Halaman Edit Postingan**
Berupa form (simulasi) untuk mengedit salah satu postingan. Mekanisma nya mirip dengan tambah postingan.
### **6. Halaman Hapus Postingan(Opsional)**
Menampilkan notif respon bahwa API telah berhasil menghapus postingan
### **7. Halaman Tentang Website**
Informasi singkat tentang website
### **8. Halaman Login (dan register)**
Form login dan register sederhana (Opsional, bisa saja hanya simulasi)
### **9. Halaman 404 (Error Page)**
Menampilkan pesan ketika pengguna mengakses URL yang tidak ada