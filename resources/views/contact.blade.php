@extends('layouts.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header">
            <h2>Hubungi Kami</h2>
        </div>

        <!-- Success and Error Messages -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- informasi contact -->
        <div class="contact-info mb-4">
            <h3>Informasi Kontak</h3>
            <p>Email: <a href="mailto:selfianasari0@gmail.com">selfianasari0@gmail.com</a></p>
            <p>Telepon: <a href="tel:+6282237659525">+62 822 3765 9525</a></p>
            <p>Alamat: Jl. Karang Turi No. 300, Limbasari, Bobotsari</p>
        </div>

        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kirim Pesan</h4>
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subjek:</label>
                                <input type="text" id="subject" name="subject" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="message">Pesan:</label>
                                <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="social-media mt-5">
            <h3>Ikuti Kami</h3>
            <p><a href="https://twitter.com/treasuremembers" target="_blank">Twitter</a></p>
            <p><a href="https://instagram.com/selfianaaasari" target="_blank">Instagram</a></p>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#complaintTable').DataTable();
        });
    </script>
@endsection
@endsection
