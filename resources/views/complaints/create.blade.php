@extends('layouts.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form Pengaduan Masyarakat </h3>
            <nav aria-label="breadcrumb"></nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Data Diri</h4>
                        <form class="forms-sample" method="POST" action="{{ route('complaints.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Telp.</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Nomor Telp." value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Complaint</h4>
                        <form class="forms-sample" method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="date" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-lg @error('category') is-invalid @enderror" id="category" name="category">
                                        <option value="cleanliness" {{ old('category') == 'cleanliness' ? 'selected' : '' }}>Kebersihan</option>
                                        <option value="security" {{ old('category') == 'security' ? 'selected' : '' }}>Keamanan</option>
                                        <option value="infrastructure" {{ old('category') == 'infrastructure' ? 'selected' : '' }}>Infrastruktur</option>
                                        <option value="public_service" {{ old('category') == 'public_service' ? 'selected' : '' }}>Layanan Publik</option>
                                        <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Deskripsi" value="{{ old('description') }}">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="location" class="col-sm-3 col-form-label">Lokasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" placeholder="Lokasi" value="{{ old('location') }}">
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="attachment" class="col-sm-3 col-form-label">Foto bukti</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachment" name="attachment">
                                    @error('attachment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="anonymous" name="anonymous" {{ old('anonymous') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="anonymous">Kirim sebagai anonim</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('privacyPolicy') is-invalid @enderror" type="checkbox" id="privacyPolicy" name="privacyPolicy" required>
                                    <label class="form-check-label" for="privacyPolicy">Saya setuju dengan <a href="#">kebijakan privasi</a></label>
                                    @error('privacyPolicy')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="button" class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
