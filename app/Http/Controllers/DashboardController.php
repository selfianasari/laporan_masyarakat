<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function index()
    {
        $complaints = Complaint::all();
        return view('dashboard.index', compact('complaints'));  
    }
}
