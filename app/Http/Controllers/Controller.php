<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::oldest()->get();
        return view('biodatas.index', compact('biodatas'));
    }

    public function create()
    {
        return view('biodatas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'nim'       => 'required|string|max:30',
            'peran'     => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto-biodata', 'public');
        }

        Biodata::create($validated);

        return redirect()->route('biodatas.index')
            ->with('success', 'Biodata berhasil ditambahkan.');
    }

    public function edit(Biodata $biodata)
    {
        return view('biodatas.edit', compact('biodata'));
    }

    public function update(Request $request, Biodata $biodata)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'nim'       => 'required|string|max:30',
            'peran'     => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($biodata->foto) {
                Storage::disk('public')->delete($biodata->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto-biodata', 'public');
        }

        $biodata->update($validated);

        return redirect()->route('biodatas.index')
            ->with('success', 'Biodata berhasil diperbarui.');
    }

    public function destroy(Biodata $biodata)
    {
        if ($biodata->foto) {
            Storage::disk('public')->delete($biodata->foto);
        }

        $biodata->delete();

        return redirect()->route('biodatas.index')
            ->with('success', 'Biodata berhasil dihapus.');
    }
}