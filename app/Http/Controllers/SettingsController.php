<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->notifications = $request->notifications;
    $user->save();

    return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
}

}
