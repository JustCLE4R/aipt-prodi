<?php

namespace App\Http\Controllers\admin\visualisasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\visualisasi\MahasiswaAktifRequest;
use App\Http\Requests\admin\visualisasi\UpdateMahasiswaAktifRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\visualisasi\MahasiswaAktif;

class MahasiswaAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswaAktifs = MahasiswaAktif::where('user_id', Auth::user()->id)->get();

        return view('admin.visualisasi.mahasiswa.aktif.index', [
            'title' => 'Mahasiswa Aktif',
            'mahasiswaAktifs' => $mahasiswaAktifs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visualisasi.mahasiswa.aktif.create', [
            'title' => 'Admin Tambah Mahasiswa Aktif',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MahasiswaAktifRequest $request)
    {
        $prepareData = $request->all();

        MahasiswaAktif::create($prepareData);

        return redirect('/admin/visualisasi/mahasiswa/aktif')->with('success', 'Data <b>' . $request->tahun . '</b> berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MahasiswaAktif $mahasiswaAktif)
    {
        return view('admin.visualisasi.mahasiswa.aktif.edit', [
            'title' => 'Admin Edit Mahasiswa Aktif',
            'mahasiswaAktif' => $mahasiswaAktif
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaAktifRequest $request, MahasiswaAktif $mahasiswaAktif)
    {
        $prepareData = $request->all();

        $mahasiswaAktif->update($prepareData);

        return redirect('/admin/visualisasi/mahasiswa/aktif')->with('success', 'Data <b>' . $request->tahun . '</b> berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MahasiswaAktif $mahasiswaAktif)
    {
        $mahasiswaAktif->delete();

        return redirect('/admin/visualisasi/mahasiswa/aktif')->with('success', 'Data <b>' . $mahasiswaAktif->tahun . '</b> berhasil dihapus');
    }
}
