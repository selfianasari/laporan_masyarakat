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
        try {
            $validatedData = $request->validate([
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

            Complaint::create($validatedData);

            return redirect()->route('dashboard')->with('success', 'Pengaduan berhasil dikirim!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        }
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

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in process,completed,rejected',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->status = $request->input('status');
        $complaint->save();

        return redirect()->route('complaints.index')->with('status', 'Status pengaduan telah diperbarui!');
    }
}
