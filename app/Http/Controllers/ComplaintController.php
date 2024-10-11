<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();
        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string',
            'date' => 'required|date',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'anonymous' => 'nullable|boolean',
        ]);

        // Menyimpan pengaduan
        $complaint = new Complaint($request->except('attachment'));

        // Jika ada file yang di-upload, simpan file-nya
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $path = $file->store('attachments', 'public');
            $complaint->attachment = $path;
        }

        $complaint->save();

        return redirect()->route('complaints.index')->with('success', 'Pengaduan Anda telah diterima.');
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('complaints.show', compact('complaint'));
    }

    public function edit($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('complaints.edit', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string',
            'date' => 'required|date',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4048',
            'anonymous' => 'nullable|boolean',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->fill($request->except('attachment'));

        // Jika ada file baru yang di-upload, ganti file lama
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $path = $file->store('attachments', 'public');
            $complaint->attachment = $path;
        }

        $complaint->save();

        return redirect()->route('complaints.index')->with('success', 'Pengaduan telah diperbarui.');
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();

        return redirect()->route('complaints.index')->with('success', 'Pengaduan telah dihapus.');
    }
}
