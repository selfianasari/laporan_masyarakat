@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kategori Pengaduan</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table id="categories-table" class="table table-striped">
        <thead>
            <tr>
                <th>Kategori ID</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td> 
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#categories-table').DataTable(); // Menginisialisasi DataTable
    });
</script>
@endsection
@endsection
