@extends('layouts.app') 

@section('title', 'Complaint Form') 

@section('content') 
<div class="container">
    <h2>Complaint Form</h2>
    <form action="/submit-complaint" method="POST" enctype="multipart/form-data">
        @csrf 

        <fieldset>
            <legend>User Information</legend>

            <label for="name">Nama Lengkap:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Nomor Telp.:</label>
            <input type="tel" id="phone" name="phone">
        </fieldset>

        <!-- Detail Pengaduan -->
        <fieldset>
            <legend>Detail Pengaduan</legend>

            <label for="date">Tanggal Pengaduan:</label>
            <input type="date" id="date" name="date" required>

            <label for="category">Kategori Pengaduan:</label>
            <select id="category" name="category" required>
                <option value="cleanliness">Kebersihan</option>
                <option value="security">Keamanan</option>
                <option value="infrastructure">Infrastruktur</option>
                <option value="public_service">Layanan Public</option>
                <option value="other">Lainnya</option>
            </select>

            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="location">Lokasi:</label>
            <input type="text" id="location" name="location">
        </fieldset>

        <!-- Lampiran -->
        <fieldset>
            <legend>Lampiran</legend>

            <label for="attachment">Upload File (optional):</label>
            <input type="file" id="attachment" name="attachment" accept="image/*,application/pdf">
        </fieldset>

        <!-- Anonimitas -->
        <fieldset>
            <legend>Pilihan Privasi</legend>

            <label>
                <input type="checkbox" id="anonymous" name="anonymous">
                Kirim Secara Anonim
            </label>

            <label>
                <input type="checkbox" name="agreement" required>
                Saya Setuju Dengan <a href="syarat-dan-ketentuan.html" target="_blank">Syarat dan Ketentuan</a>.
            </label>
        </fieldset>

        <button type="submit">Kirim</button>
    </form>
</div>
@endsection
