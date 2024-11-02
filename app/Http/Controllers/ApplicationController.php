<?php

namespace App\Http\Controllers;

use App\Models\Application; // Import model Application
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // Method untuk menampilkan semua aplikasi
    public function index(Request $request)
    {
        $query = Application::query();

        // Filter berdasarkan status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Pencarian berdasarkan nama perusahaan atau posisi
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('company_name', 'like', '%' . $request->search . '%')
                  ->orWhere('position', 'like', '%' . $request->search . '%');
            });
        }

        $applications = $query->get();
        return view('applications.index', compact('applications'));
    }

    // Method untuk menampilkan form pembuatan aplikasi
    public function create()
    {
        return view('applications.create');
    }

    // Method untuk menyimpan aplikasi baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'date_applied' => 'required|date',
            'status' => 'required|in:Pending,Interview,Rejected,Accepted',
        ]);

        // Simpan data aplikasi baru
        Application::create($request->all());
        return redirect()->route('applications.index')->with('success', 'Application created successfully!');
    }

    // Method untuk menampilkan form edit aplikasi
    public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }

    // Method untuk mengupdate aplikasi
    public function update(Request $request, Application $application)
    {
        // Validasi data
        $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'date_applied' => 'required|date',
            'status' => 'required|in:Pending,Interview,Rejected,Accepted',
        ]);

        // Update aplikasi
        $application->update($request->all());
        return redirect()->route('applications.index')->with('success', 'Application updated successfully!');
    }

    // Method untuk menghapus aplikasi
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Application deleted successfully!');
    }
}
