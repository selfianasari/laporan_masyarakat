@extends('layouts.app')

@section('title', 'Daftar Pengaduan')

@section('content')
<div class="container">
    <h2>Daftar Pengaduan</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Lampiran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $complaint)
            <tr>
                <td>{{ $complaint->name }}</td>
                <td>{{ $complaint->email }}</td>
                <td>{{ $complaint->category }}</td>
                <td>{{ $complaint->description }}</td>
                <td>
                    <!-- Menampilkan status -->
                    @if(auth()->user() && auth()->user()->role === 'admin')
                        <form action="{{ route('complaints.updateStatus', $complaint->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="form-select">
                                <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in process" {{ $complaint->status == 'in process' ? 'selected' : '' }}>In Process</option>
                                <option value="completed" {{ $complaint->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="rejected" {{ $complaint->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </form>
                    @else
                        {{ ucfirst($complaint->status) }}
                    @endif
                </td>
                <td>
                    @if($complaint->attachment)
                        @if(Str::endsWith($complaint->attachment, ['.jpg', '.jpeg', '.png']))
                            <img src="{{ asset('storage/'.$complaint->attachment) }}" alt="Lampiran" width="100">
                        @elseif(Str::endsWith($complaint->attachment, '.pdf'))
                            <a href="{{ asset('storage/'.$complaint->attachment) }}" target="_blank">Lihat PDF</a>
                        @endif
                    @else
                        Tidak ada lampiran
                    @endif
                </td>
                <td>
                    <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-info btn-sm">Detail</a>

                    <!-- Tampilkan tombol hapus hanya untuk admin -->
                    @if(auth()->user() && auth()->user()->role === 'admin')
                        <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
