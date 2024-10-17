@extends('layouts.app')

@section('content')
<div class="container mx-auto bg-gray-100 p-6">
    <h2 class="font-semibold text-xl text-gray-800">Dashboard</h2>
    <p>Selamat datang di dashboard!</p>

    <div class="mt-6">
        <h3 class="text-lg font-semibold">Data Pengaduan</h3>

        @if($complaints->isEmpty())
            <p>Tidak ada pengaduan yang tersedia.</p>
        @else
            <table class="min-w-full bg-gray-200 border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Kategori</th>
                        <th class="py-2 px-4 border-b">Deskripsi</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Lampiran</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint) 
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $complaint->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $complaint->category }}</td>
                            <td class="py-2 px-4 border-b">{{ $complaint->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $complaint->date }}</td>
                            <td class="py-2 px-4 border-b">
                                <!-- Tampilkan status, admin bisa mengubah -->
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
                            <td class="py-2 px-4 border-b">
                                <!-- Menampilkan lampiran -->
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
                            <td class="py-2 px-4 border-b">
                                <!-- Tindakan untuk semua pengguna (Detail) -->
                                <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-info btn-sm">Detail</a>
                                
                                <!-- Tindakan untuk admin (Hapus) -->
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
        @endif
    </div>
</div>
@endsection
