<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Menampilkan daftar laporan
    public function index()
    {
        $reports = Report::with('user')->get(); 
        return view('reports.index', compact('reports'));
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    // Mengupdate status atau catatan penyelesaian laporan
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'status' => 'required|in:pending,in_process,completed,rejected',
            'resolution_notes' => 'nullable|string',
        ]);

        $report->update($request->only('status', 'resolution_notes', 'resolved_at'));
        
        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui.');
    }
}


