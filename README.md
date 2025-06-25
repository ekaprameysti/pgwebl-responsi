# 🌊 **SEASIDE: Beaches Exploration and Spatial Information for District Rembang**
![image](https://github.com/user-attachments/assets/128c849d-5444-47c2-aa12-66c40bee7744)
**SEASIDE** adalah website interaktif berbasis Laravel yang dirancang untuk membantu masyarakat dan wisatawan menjelajahi pesisir Kabupaten Rembang. Aplikasi ini menyajikan data titik pantai, estimasi rute, area pesisir, ulasan pengunjung, hingga galeri foto dengan tampilan peta interaktif dan antarmuka menarik. Platform ini menggabungkan data spasial dan konten visual untuk mempromosikan kekayaan wisata bahari Rembang dalam satu sistem informasi.

---

## 🌟 Fitur Utama
![image](https://github.com/user-attachments/assets/d808d9a7-abb6-411f-99e5-6a5a5f72f0b3)
![image](https://github.com/user-attachments/assets/1e3b7c91-0678-4145-a331-6a4306c2d068)

### 🗘️ 1. Peta Interaktif
![image](https://github.com/user-attachments/assets/4132a0b5-f776-4fd6-a695-17af9365b0c2)
![image](https://github.com/user-attachments/assets/eba5d80f-e7e9-4a73-b3f1-43d88aebecc5)
![image](https://github.com/user-attachments/assets/f92dcef4-30ea-42af-90c6-0241f3e69a32)
![image](https://github.com/user-attachments/assets/349d13f9-dcfe-48fb-8414-9d6fc3bb82aa)
![image](https://github.com/user-attachments/assets/7de1c5d2-1602-4789-8e6b-e4e47edc72e3)
- Menampilkan:
  - Titik lokasi pantai
  - Estimasi rute antar pantai
  - Area pesisir/desa pantai
- Klik marker untuk melihat popup deskripsi, panjang rute, luas area, dan tombol edit/hapus data.
- Pengguna bisa menambahkan daftar pantai apabila sudah login.
- Tampilan Base Maps yang beragam menyesuaikan dengan kebutuhan pengguna.
- Peta dapat diakses dan digunakan secara langsung di perangkat pengguna.

---

### 📊 2. Tabel Data Lokasi
![image](https://github.com/user-attachments/assets/7189c44a-a54f-4218-8574-b2638b7e0614)

- Menyediakan daftar lengkap data:
  - Pantai
  - Rute antar pantai
  - Area pesisir
- Tabel interaktif dilengkapi fitur pencarian dan desain responsif.

---

### 🖼️ 3. Galeri Foto Wisata
![image](https://github.com/user-attachments/assets/7c930620-d87f-40f4-a1cc-ff8064807d56)
![image](https://github.com/user-attachments/assets/5f4e8275-0d82-4635-8dfa-d9f21cc99c27)
- Galeri visual yang menampilkan:
  - Pemandangan pantai
  - Sunset & sunrise
  - Boardwalk, spot foto, dan area mangrove
- Gambar dapat diperbesar dan dilihat detailnya.

---

### 🧽 4. Eksplorasi Budaya & Fasilitas
![image](https://github.com/user-attachments/assets/5afd8c6d-5131-4ae6-b3fa-a379760f7104)
![image](https://github.com/user-attachments/assets/01c5c26a-a644-48fb-b34c-b747273bfc40)
![image](https://github.com/user-attachments/assets/544fdff5-ca2f-4b03-9765-341309d5d126)
![image](https://github.com/user-attachments/assets/3d9577a7-8850-42c3-9ac6-0bdbec135b47)
- Menyajikan informasi budaya pesisir (Pathol Sarang, Emprak, Tari Gandario, dll).
- Pengguna dapat melihat artikel terkait budaya karena ketika klik fitur 
- Menampilkan fasilitas wisata seperti penginapan, warung, mushola, dan spot Instagramable.
- Halaman Coastal Culture menampilkan tradisi dan kesenian pesisir Rembang yang dilengkapi gambar, deskripsi, dan link referensi resmi.

---

### 📝 5. Ulasan Pengunjung
![image](https://github.com/user-attachments/assets/6c75ae76-5843-416f-a35a-4cdd2deb391b)
![image](https://github.com/user-attachments/assets/2789f222-cec0-498a-aa73-6071b552096c)
- Pengguna dapat mengisi form ulasan berdasarkan pantai yang dikunjungi.
- Setiap ulasan mencakup:
  - Nama pengulas
  - Komentar
  - Rating (1–5 bintang)
- Ulasan tampil dinamis dan dapat difilter berdasarkan lokasi pantai.

---

### 📊 6. Tampilan Data GeoJSON
![image](https://github.com/user-attachments/assets/d2906ac7-1831-4258-9569-535ed041625a)
![image](https://github.com/user-attachments/assets/521f43fd-8c00-4c78-9ec7-fad8e191c921)
![image](https://github.com/user-attachments/assets/24977a85-dee6-4fa8-af9f-76b245cfae04)
- Data spasial diklasifikasikan dalam 3 format GeoJSON:
  - **Points**: merepresentasikan titik lokasi pantai
  - **Polylines**: menggambarkan rute estimasi antar pantai
  - **Polygons**: menunjukkan batas wilayah desa atau area pesisir
- Tersedia di dropdown menu "Data" dan ditampilkan langsung di peta dengan popup interaktif.

---

### 🗺️ 7. Rute Lokasi Pantai via Google Maps
![image](https://github.com/user-attachments/assets/3d8f3fdc-a7f4-47bd-8ae0-cfc1b13f2734)
![image](https://github.com/user-attachments/assets/eecdcdeb-12e5-4d45-a2eb-23d8a173bcd8)
- Menyediakan link navigasi langsung dari lokasi pengunjung ke pantai tujuan.
- Tersedia dalam tampilan grid interaktif dengan Google Maps embed.
- Klik "Open Route in Google Maps" untuk melihat jalur langsung dari aplikasi ke Maps.

---

## 💡 Manfaat Proyek
- Mempermudah wisatawan menjelajahi pesisir Rembang dengan informasi visual dan spasial yang interaktif.
- Mempromosikan potensi wisata pantai dan budaya pesisir Rembang secara digital.
- Menjadi media pembelajaran pemrograman geospasial berbasis Laravel dan Leaflet.
- Mendukung digitalisasi sektor pariwisata daerah.
- Menyediakan platform ulasan publik untuk meningkatkan pengalaman pengunjung.

---

## 💻 Teknologi yang Digunakan

| Komponen              | Teknologi                                  |
|-----------------------|---------------------------------------------|
| Backend               | Laravel 10                                  |
| Frontend              | Blade, HTML, CSS, Bootstrap 5, Tailwind     |
| Peta Interaktif       | Leaflet JS                                  |
| Basis Data            | MySQL                                       |
| Tabel Interaktif      | DataTables (jQuery Plugin)                  |
| Ikon & Desain         | FontAwesome, Bootstrap Icons                |
| Review & Form         | Form blade + rating bintang custom          |
| GeoJSON               | Manual via file `/public/geojson/`          |
| Galeri & Gambar       | Local image folder `/public/images/`        |
| Rute ke Maps          | Google Maps Embed (iframe)                  |

---

## 📂 Struktur Data
- `/public/geojson/` → data geojson untuk pantai, garis, dan area
- `/resources/views/` → file tampilan blade (peta, review, explore, table)
- `/public/images/` → koleksi gambar galeri pantai
- `/app/Models/` → model untuk Points, Polylines, Polygons, Reviews
- `/app/Http/Controllers/` → controller utama proyek

---

## 👤 Developer
![image](https://github.com/user-attachments/assets/2baca617-6e6e-4d02-896e-06841a5070ea)
![image](https://github.com/user-attachments/assets/4601f104-e979-4086-a381-0bfa4da41ab2)
![image](https://github.com/user-attachments/assets/5b2ba2ce-a41b-4d43-ad65-438600d5b539)
- Pengguna bisa melihat media sosial developer hanya dengan klik pada logo medsos yang ingin dibuka.
