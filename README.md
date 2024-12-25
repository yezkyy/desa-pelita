# Desa Pelita

Desa Pelita adalah sebuah template website untuk desa yang menawarkan keindahan alam, budaya lokal, dan cita rasa kuliner yang menggugah selera. Template ini dirancang untuk memudahkan pengguna dalam membuat website desa yang interaktif dan informatif.

## Fitur

- **Parallax Section**: Bagian parallax yang menarik di halaman utama.
- **Animasi AOS**: Animasi yang elegan dan interaktif menggunakan AOS (Animate On Scroll).
- **Halaman Wisata**: Menampilkan destinasi wisata populer di desa.
- **Halaman Kuliner**: Menampilkan kuliner khas desa.
- **Testimoni Pengunjung**: Menampilkan testimoni dari pengunjung desa.
- **Kontak Kami**: Formulir kontak untuk berkomunikasi dengan pengelola desa.
- **Dashboard Admin**: Halaman admin untuk mengelola konten wisata dan kuliner.

## Instalasi

1. **Clone Repository**
   ```bash
    git clone https://github.com/yezkyy/desa-pelita.git
    cd desa-pelita
   ```
2. **Install Dependencies**
   ```bash
    composer install
    npm install
   ```
3. **Copy .env File**
   ```bash
    cp .env.example .env
   ```
4. **Generate Application Key**
   ```bash
    php artisan key:generate
   ```
5. **Configure Database**
    - Buka file .env dan sesuaikan konfigurasi database:
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=username
    DB_PASSWORD=password
   ```
5. **Configure Database**
   ```bash
    php artisan migrate
   ```
6. **Configure Database**
   ```bash
    php artisan serve
   ```

## Penggunaan
1. Akses Halaman Utama
- Buka browser dan akses http://localhost:8000 untuk melihat halaman utama Desa Pelita. 

2. Login Admin
- Akses http://localhost:8000/login untuk login sebagai admin dan mengelola konten.