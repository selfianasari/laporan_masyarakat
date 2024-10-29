@extends('layouts.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Daftar Pengaduan </h3>
            <nav aria-label="breadcrumb"></nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pengaduan</h4>
                        <div class="table-responsive">
                            <table class="table" id="complaintsTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Lampiran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complaints as $complaint)
                                    <tr>
                                        <td>{{ $complaint->name }}</td>
                                        <td>{{ $complaint->category }}</td>
                                        <td>{{ $complaint->description }}</td>
                                        <td>{{ $complaint->date }}</td>
                                        <td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#complaintsTable').DataTable();
    });
</script>
@endsection
