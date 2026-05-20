# Panduan Belajar Project app2trpl2b

Project ini adalah aplikasi web Laravel untuk mengelola data akademik, terutama data **Mahasiswa** dan **Dosen**. Aplikasi memakai konsep MVC Laravel: route menerima request, controller memproses logika, model berhubungan dengan database, lalu Blade menampilkan halaman.

## 1. Teknologi Yang Dipakai

| Bagian | Teknologi | Fungsi |
| --- | --- | --- |
| Backend | Laravel 13 | Framework utama aplikasi |
| Bahasa | PHP 8.3 | Bahasa pemrograman server |
| Database | MySQL | Menyimpan data mahasiswa dan dosen |
| Frontend | Blade + Bootstrap 5 | Template HTML dan tampilan UI |
| Asset build | Vite + Tailwind CSS | Mengelola asset CSS/JS modern |
| Testing | PHPUnit | Menjalankan test Laravel |

File penting:

- `composer.json`: dependency PHP/Laravel.
- `package.json`: dependency frontend seperti Vite dan Tailwind.
- `.env.example`: contoh konfigurasi environment.
- `routes/web.php`: daftar URL aplikasi.

## 2. Cara Menjalankan Project

Pastikan sudah ada PHP, Composer, Node.js, npm, dan MySQL.

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Jika ingin menjalankan Vite untuk asset frontend:

```bash
npm run dev
```

Jika ingin build asset untuk production:

```bash
npm run build
```

Konfigurasi database pada `.env.example`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app2trpl2b
DB_USERNAME=root
DB_PASSWORD=
```

Artinya sebelum menjalankan migration, buat database bernama `app2trpl2b` di MySQL.

## 3. Struktur Folder Yang Perlu Dipahami

```text
app/
  Http/Controllers/
    MahasiswaController.php
    DosenController.php
  Models/
    Mahasiswa.php
    Dosen.php

database/
  migrations/
    create_mahasiswas_table.php
    create_dosens_table.php

resources/
  views/
    layouts/
      main.blade.php
      header.blade.php
      footer.blade.php
    mahasiswa/
      index.blade.php
      create.blade.php
      edit.blade.php
      show.blade.php
    dosen/
      index.blade.php
      create.blade.php
      edit.blade.php
      show.blade.php

routes/
  web.php
```

Penjelasan singkat:

- `routes/web.php`: mengatur URL dan method HTTP.
- `Controller`: mengatur proses CRUD.
- `Model`: representasi tabel database.
- `Migration`: struktur tabel database.
- `Blade`: file tampilan HTML.
- `layouts/main.blade.php`: template utama yang dipakai halaman lain.

## 4. Alur Kerja MVC Di Project Ini

Contoh ketika membuka halaman daftar mahasiswa:

```text
Browser membuka /mahasiswa
        |
routes/web.php mencocokkan URL
        |
MahasiswaController@index dijalankan
        |
Model Mahasiswa mengambil data dari tabel mahasiswas
        |
View mahasiswa/index.blade.php menampilkan tabel
```

Kode route:

```php
Route::get('/', [MahasiswaController::class, 'index'])->name('index');
```

Kode controller:

```php
public function index()
{
    $mahasiswa = Mahasiswa::latest()->paginate(6);
    return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
}
```

Maknanya:

- `Mahasiswa::latest()` mengambil data terbaru berdasarkan `created_at`.
- `paginate(6)` membatasi 6 data per halaman.
- `view('mahasiswa.index')` membuka file `resources/views/mahasiswa/index.blade.php`.
- `['mahasiswa' => $mahasiswa]` mengirim data ke Blade.

## 5. Route Aplikasi

### Route Home

| Method | URL | Nama Route | Tujuan |
| --- | --- | --- | --- |
| GET | `/` | `home` | Menampilkan halaman home |

### Route Mahasiswa

| Method | URL | Nama Route | Controller | Fungsi |
| --- | --- | --- | --- | --- |
| GET | `/mahasiswa` | `mahasiswa.index` | `MahasiswaController@index` | Menampilkan daftar mahasiswa |
| GET | `/mahasiswa/create` | `mahasiswa.create` | `MahasiswaController@create` | Menampilkan form tambah |
| POST | `/mahasiswa` | `mahasiswa.store` | `MahasiswaController@store` | Menyimpan data baru |
| GET | `/mahasiswa/{mahasiswa}/edit` | `mahasiswa.edit` | `MahasiswaController@edit` | Menampilkan form edit |
| GET | `/mahasiswa/{mahasiswa}` | `mahasiswa.show` | `MahasiswaController@show` | Menampilkan detail |
| PUT | `/mahasiswa/{mahasiswa}` | `mahasiswa.update` | `MahasiswaController@update` | Memperbarui data |
| DELETE | `/mahasiswa/{mahasiswa}` | `mahasiswa.destroy` | `MahasiswaController@destroy` | Menghapus data |

### Route Dosen

| Method | URL | Nama Route | Controller | Fungsi |
| --- | --- | --- | --- | --- |
| GET | `/dosen` | `dosen.index` | `DosenController@index` | Menampilkan daftar dosen |
| GET | `/dosen/create` | `dosen.create` | `DosenController@create` | Menampilkan form tambah |
| POST | `/dosen` | `dosen.store` | `DosenController@store` | Menyimpan data baru |
| GET | `/dosen/{dosen}/edit` | `dosen.edit` | `DosenController@edit` | Menampilkan form edit |
| PUT | `/dosen/{dosen}` | `dosen.update` | `DosenController@update` | Memperbarui data |
| GET | `/dosen/{dosen}` | `dosen.show` | `DosenController@show` | Menampilkan detail |
| DELETE | `/dosen/{dosen}` | `dosen.destroy` | `DosenController@destroy` | Menghapus data |

## 6. Database Dan Model

### Tabel `mahasiswas`

Dibuat oleh migration `database/migrations/2026_04_29_035610_create_mahasiswas_table.php`.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` | big integer | Primary key |
| `nim` | char(10) | Nomor induk mahasiswa |
| `nama_lengkap` | string | Nama mahasiswa |
| `tempat_lahir` | string | Tempat lahir |
| `tgl_lahir` | date | Tanggal lahir |
| `email` | string | Email mahasiswa |
| `prodi` | string | Program studi |
| `alamat` | string | Alamat |
| `created_at` | timestamp | Waktu dibuat |
| `updated_at` | timestamp | Waktu diperbarui |

Model:

```php
class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        'email',
        'prodi',
        'alamat'
    ];
}
```

`$fillable` menentukan kolom mana yang boleh diisi dengan `Mahasiswa::create($validated)`.

### Tabel `dosens`

Dibuat oleh migration `database/migrations/2026_05_19_163224_create_dosens_table.php`.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` | big integer | Primary key |
| `nik` | char(15) | Nomor induk dosen |
| `nama` | string | Nama dosen |
| `email` | string | Email dosen |
| `notelp` | string | Nomor telepon |
| `prodi` | string | Program studi |
| `alamat` | string | Alamat |
| `created_at` | timestamp | Waktu dibuat |
| `updated_at` | timestamp | Waktu diperbarui |

Model:

```php
class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'email',
        'notelp',
        'prodi',
        'alamat'
    ];
}
```

## 7. CRUD Mahasiswa

### Create

File yang terlibat:

- `routes/web.php`
- `MahasiswaController@create`
- `resources/views/mahasiswa/create.blade.php`
- `MahasiswaController@store`
- `app/Models/Mahasiswa.php`

Alur:

```text
GET /mahasiswa/create
        |
menampilkan form tambah mahasiswa
        |
user submit form
        |
POST /mahasiswa
        |
validasi data
        |
simpan ke tabel mahasiswas
        |
redirect ke mahasiswa.index
```

Validasi pada `store`:

```php
$validated = $request->validate([
    'nim' => 'required|unique:mahasiswas,nim|max:10',
    'nama_lengkap' => 'required|string|max:255',
    'tempat_lahir' => 'required|string|max:255',
    'tanggal' => 'required|integer|min:1|max:31',
    'bulan' => 'required|integer|min:1|max:12',
    'tahun' => 'required|integer|min:1900|max:' . date('Y'),
    'email' => 'required|email|unique:mahasiswas,email',
    'prodi' => 'required|string|max:50',
    'alamat' => 'required|string',
]);
```

Bagian menarik:

```php
$validated['tgl_lahir'] = sprintf('%04d-%02d-%02d', $validated['tahun'], $validated['bulan'], $validated['tanggal']);
unset($validated['tanggal'], $validated['bulan'], $validated['tahun']);
```

Form mengirim `tanggal`, `bulan`, dan `tahun` secara terpisah. Controller menggabungkannya menjadi `tgl_lahir` dengan format `YYYY-MM-DD`, lalu menghapus field sementara agar sesuai dengan kolom database.

### Read

Daftar mahasiswa:

```php
$mahasiswa = Mahasiswa::latest()->paginate(6);
```

Detail mahasiswa:

```php
$mahasiswa = Mahasiswa::findOrFail($id);
```

`findOrFail($id)` akan mencari data berdasarkan `id`. Jika tidak ada, Laravel otomatis menampilkan halaman error 404.

### Update

Update memakai method `PUT`:

```blade
<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
    @csrf
    @method('PUT')
</form>
```

Karena HTML form hanya mendukung `GET` dan `POST`, Laravel memakai `@method('PUT')` untuk mensimulasikan method `PUT`.

Validasi unik saat update:

```php
'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id . '|max:10',
'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
```

Maknanya: NIM dan email harus unik, tetapi data milik mahasiswa yang sedang diedit boleh tetap sama.

### Delete

```php
Mahasiswa::destroy($id);
```

Di Blade:

```blade
<form action="{{ route('mahasiswa.destroy', $item->id) }}" method="post">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger btn-sm">Hapus</button>
</form>
```

`@csrf` wajib untuk melindungi form dari serangan CSRF.

## 8. CRUD Dosen

CRUD dosen mirip dengan mahasiswa. File utamanya:

- `app/Http/Controllers/DosenController.php`
- `app/Models/Dosen.php`
- `resources/views/dosen/index.blade.php`
- `resources/views/dosen/create.blade.php`
- `resources/views/dosen/edit.blade.php`
- `resources/views/dosen/show.blade.php`

Contoh simpan data dosen:

```php
$validate = $request->validate([
    'nik' => 'required|unique:dosens,nik|max:15',
    'nama' => 'required|string|max:255',
    'email' => 'required|email|unique:dosens',
    'notelp' => 'required',
    'prodi' => 'required|string',
    'alamat' => 'required|string',
]);

Dosen::create($validate);
```

Karena model `Dosen` punya `$fillable`, data dari hasil validasi bisa langsung dikirim ke `Dosen::create()`.

## 9. Blade Layout

Layout utama ada di `resources/views/layouts/main.blade.php`.

Konsep penting:

```blade
@include('layouts.header')

@yield('content')

@include('layouts.footer')
```

Maknanya:

- `@include` memasukkan file Blade lain.
- `@yield('content')` menyediakan tempat untuk isi halaman.
- Halaman seperti `home.blade.php` atau `mahasiswa/index.blade.php` mengisi tempat tersebut dengan `@section('content')`.

Contoh:

```blade
@extends('layouts.main')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h2>Daftar Mahasiswa Jurusan TI</h2>
@endsection
```

## 10. Helper Blade Yang Sering Dipakai

| Helper | Contoh | Fungsi |
| --- | --- | --- |
| `route()` | `route('mahasiswa.index')` | Membuat URL dari nama route |
| `old()` | `old('nim')` | Mengambil input lama setelah validasi gagal |
| `$errors` | `$errors->any()` | Mengecek error validasi |
| `@csrf` | `@csrf` | Token keamanan form |
| `@method()` | `@method('DELETE')` | Override method HTTP |
| `$loop` | `$loop->iteration` | Informasi perulangan Blade |

## 11. Pagination

Controller:

```php
$mahasiswa = Mahasiswa::latest()->paginate(6);
```

Blade:

```blade
{{ $mahasiswa->links() }}
```

Laravel otomatis membuat link pagination. Pada tabel mahasiswa, nomor urut disesuaikan dengan halaman:

```blade
{{ $loop->iteration + ($mahasiswa->currentPage() - 1) * $mahasiswa->perPage() }}
```

Jadi jika per halaman 6 data, halaman 2 akan dimulai dari nomor 7.

## 12. Catatan Debugging Dari Project Ini

Bagian ini bisa dipakai sebagai latihan memperbaiki bug.

### 1. Typo validasi `notelp` pada update dosen

Di `DosenController@update` ada aturan:

```php
'notelp' => 'requiredr',
```

Seharusnya:

```php
'notelp' => 'required',
```

Jika typo ini tidak diperbaiki, validasi nomor telepon bisa bermasalah.

### 2. Kolom NIK dosen di index memakai `nim`

Di `resources/views/dosen/index.blade.php`:

```blade
<td>{{ $item->nim }}</td>
```

Seharusnya:

```blade
<td>{{ $item->nik }}</td>
```

Karena tabel `dosens` punya kolom `nik`, bukan `nim`.

### 3. SweetAlert dipakai tetapi script belum terlihat dimuat

Di `layouts/main.blade.php` ada:

```js
Swal.fire(...)
```

Jika ingin memakai SweetAlert, perlu menambahkan CDN SweetAlert sebelum script tersebut:

```html
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
```

Kalau tidak ditambahkan, browser bisa menampilkan error `Swal is not defined`.

### 4. File Blade cadangan

Di folder mahasiswa ada:

```text
create.blade1.php
create.blade copy.php
```

Untuk belajar tidak masalah, tetapi dalam project rapi sebaiknya file cadangan seperti ini dihapus atau dipindahkan agar tidak membingungkan.

## 13. Latihan Belajar Bertahap

### Latihan 1: Pahami route

Buka `routes/web.php`, lalu jawab:

- URL apa yang dipakai untuk daftar mahasiswa?
- Method apa yang dipakai untuk menyimpan mahasiswa?
- Apa nama route untuk menghapus dosen?

### Latihan 2: Tambahkan field baru

Tambahkan field `jenis_kelamin` pada mahasiswa.

Langkah yang perlu dipikirkan:

1. Tambah kolom di migration baru.
2. Tambah `jenis_kelamin` di `$fillable` model Mahasiswa.
3. Tambah input di form create dan edit.
4. Tambah validasi di `store` dan `update`.
5. Tampilkan di tabel index dan halaman detail.

### Latihan 3: Tambahkan fitur search mahasiswa

Target:

- User bisa mencari mahasiswa berdasarkan `nim`, `nama_lengkap`, atau `prodi`.
- Form search dikirim lewat query string, misalnya `/mahasiswa?search=andi`.

Contoh ide controller:

```php
$search = request('search');

$mahasiswa = Mahasiswa::query()
    ->when($search, function ($query, $search) {
        $query->where('nim', 'like', "%{$search}%")
              ->orWhere('nama_lengkap', 'like', "%{$search}%")
              ->orWhere('prodi', 'like', "%{$search}%");
    })
    ->latest()
    ->paginate(6);
```

### Latihan 4: Buat CRUD Prodi

Navbar sudah punya menu `Prodi`, tetapi belum ada route dan controller. Ini cocok untuk latihan membuat CRUD baru.

Yang bisa dibuat:

- Model `Prodi`
- Migration `prodis`
- Controller `ProdiController`
- View `prodi/index.blade.php`, `create`, `edit`, dan `show`
- Route prefix `prodi`

### Latihan 5: Rapikan validasi tanggal lahir

Saat ini tanggal, bulan, dan tahun divalidasi terpisah. Latihan lanjutannya: pastikan tanggal valid secara kalender. Contoh, 31 Februari seharusnya tidak boleh diterima.

## 14. Ringkasan Konsep Penting

| Konsep | Di Project Ini |
| --- | --- |
| Routing | `routes/web.php` |
| Controller | `MahasiswaController`, `DosenController` |
| Model | `Mahasiswa`, `Dosen` |
| Migration | Tabel `mahasiswas` dan `dosens` |
| View | Blade di `resources/views` |
| Layout | `layouts/main.blade.php` |
| Validasi | `$request->validate([...])` |
| Create data | `Model::create($validated)` |
| Read data | `Model::latest()->paginate()` dan `findOrFail()` |
| Update data | `$model->update($validated)` |
| Delete data | `Model::destroy($id)` |
| Redirect | `redirect()->route(...)->with(...)` |

## 15. Urutan Belajar Yang Disarankan

1. Buka `routes/web.php` dan pahami semua URL.
2. Buka `MahasiswaController.php`, pelajari method `index`, `create`, `store`, `edit`, `update`, dan `destroy`.
3. Cocokkan setiap method controller dengan file Blade di `resources/views/mahasiswa`.
4. Buka migration mahasiswa untuk melihat struktur tabel.
5. Ulangi langkah yang sama untuk modul dosen.
6. Perbaiki typo kecil pada bagian debugging.
7. Coba tambah satu fitur baru, misalnya search atau CRUD Prodi.

Dengan memahami project ini, kamu sudah memegang pola dasar Laravel CRUD: route, controller, model, migration, view, validasi, pagination, dan redirect.
