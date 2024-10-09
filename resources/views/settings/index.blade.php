@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pengaturan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                <h4 class="mt-4">Informasi Akun</h4>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                </div>

                <h4 class="mt-4">Pengaturan Keamanan</h4>
                <div class="form-group">
                    <label for="password">Kata Sandi Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi baru">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi kata sandi baru">
                </div>

                <h4 class="mt-4">Notifikasi</h4>
                <div class="form-group">
                    <label for="notifications">Aktifkan Notifikasi</label>
                    <select name="notifications" class="form-control">
                        <option value="1" {{ Auth::user()->notifications ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !Auth::user()->notifications ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
