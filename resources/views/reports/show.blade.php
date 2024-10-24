@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Detail Laporan</h1>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold">Kategori: {{ $report->category }}</h2>
        <p><strong>Deskripsi:</strong> {{ $report->description }}</p>
        <p><strong>Status:</strong> {{ $report->status }}</p>
        <p><strong>Diajukan Oleh:</strong> {{ $report->user->name }}</p>

        <form action="{{ route('reports.update', $report) }}" method="POST" class="mt-4">
            @csrf
            @method('POST')
            <div>
                <label for="status" class="block">Status:</label>
                <select name="status" id="status" class="mt-1 border rounded p-2">
                    <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_process" {{ $report->status === 'in_process' ? 'selected' : '' }}>In Process</option>
                    <option value="completed" {{ $report->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="rejected" {{ $report->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div class="mt-2">
                <label for="resolution_notes" class="block">Catatan Penyelesaian:</label>
                <textarea name="resolution_notes" id="resolution_notes" class="mt-1 border rounded p-2" rows="4">{{ $report->resolution_notes }}</textarea>
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded">Perbarui Laporan</button>
        </form>
    </div>
</div>
@endsection
