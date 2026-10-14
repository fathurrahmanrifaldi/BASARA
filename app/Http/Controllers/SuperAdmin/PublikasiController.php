<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::with('user')->latest()->paginate(10);
        return view('super-admin.publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        return view('super-admin.publikasi.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'ringkasan' => 'nullable|string|max:500',
            'konten'    => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'    => 'required|in:published,draft',
        ]);

        $data = [
            'judul'     => $request->judul,
            'slug'      => Publikasi::generateUniqueSlug($request->judul),
            'ringkasan' => $request->ringkasan,
            'konten'    => $request->konten,
            'status'    => $request->status,
            'user_id'   => Auth::id(),
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('publikasi', 'public');
        }

        Publikasi::create($data);

        return redirect()->route('super-admin.publikasi.index')
            ->with('success', 'Publikasi berhasil diterbitkan/disimpan!');
    }

    public function edit(Publikasi $publikasi)
    {
        return view('super-admin.publikasi.form', compact('publikasi'));
    }

    public function update(Request $request, Publikasi $publikasi)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'ringkasan' => 'nullable|string|max:500',
            'konten'    => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'    => 'required|in:published,draft',
        ]);

        $data = [
            'judul'     => $request->judul,
            'ringkasan' => $request->ringkasan,
            'konten'    => $request->konten,
            'status'    => $request->status,
        ];

        if ($publikasi->judul !== $request->judul) {
            $data['slug'] = Publikasi::generateUniqueSlug($request->judul, $publikasi->id);
        }

        if ($request->hasFile('gambar')) {
            if ($publikasi->gambar && Storage::disk('public')->exists($publikasi->gambar)) {
                Storage::disk('public')->delete($publikasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('publikasi', 'public');
        }

        $publikasi->update($data);

        return redirect()->route('super-admin.publikasi.index')
            ->with('success', 'Publikasi berhasil diperbarui!');
    }

    public function destroy(Publikasi $publikasi)
    {
        if ($publikasi->gambar && Storage::disk('public')->exists($publikasi->gambar)) {
            Storage::disk('public')->delete($publikasi->gambar);
        }

        $publikasi->delete();

        return back()->with('success', 'Publikasi berhasil dihapus!');
    }
}
