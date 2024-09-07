<?php

namespace App\Http\Controllers\admin\visualisasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\visualisasi\CalonMahasiswaRequest;
use App\Http\Requests\admin\visualisasi\UpdateCalonMahasiswaRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\visualisasi\CalonMahasiswa;

class CalonMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calonMahasiswas = CalonMahasiswa::where('user_id', Auth::user()->id)->get();

        return view('admin.visualisasi.mahasiswa.calon.index', [
            'title' => 'Calon Mahasiswa',
            'calonMahasiswas' => $calonMahasiswas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visualisasi.mahasiswa.calon.create', [
            'title' => 'Admin Tambah Calon Mahasiswa',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CalonMahasiswaRequest $request)
    {
        $prepareData = $request->all();

        CalonMahasiswa::create($prepareData);

        return redirect('/admin/visualisasi/mahasiswa/calon')->with('success', 'Data <b>' . $request->tahun . '</b> berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalonMahasiswa $calonMahasiswa)
    {
        return view('admin.visualisasi.mahasiswa.calon.edit', [
            'title' => 'Admin Edit Calon Mahasiswa',
            'calonMahasiswa' => $calonMahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCalonMahasiswaRequest $request, CalonMahasiswa $calonMahasiswa)
    {
        $prepareData = $request->all();

        $calonMahasiswa->update($prepareData);

        return redirect('/admin/visualisasi/mahasiswa/calon')->with('success', 'Data <b>' . $request->tahun . '</b> berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalonMahasiswa $calonMahasiswa)
    {
        $calonMahasiswa->delete();

        return redirect('/admin/visualisasi/mahasiswa/calon')->with('success', 'Data <b>' . $calonMahasiswa->tahun . '</b> berhasil dihapus');
    }
}
