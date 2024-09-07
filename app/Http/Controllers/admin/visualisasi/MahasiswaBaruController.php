<?php

namespace App\Http\Controllers\admin\visualisasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\visualisasi\MahasiswaBaruRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\visualisasi\MahasiswaBaru;

class MahasiswaBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswaBarus = MahasiswaBaru::where('user_id', Auth::user()->id)->get();

        return view('admin.visualisasi.mahasiswa.baru.index', [
            'title' => 'Mahasiswa Baru',
            'mahasiswaBarus' => $mahasiswaBarus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visualisasi.mahasiswa.baru.create', [
            'title' => 'Admin Tambah Mahasiswa Baru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MahasiswaBaruRequest $request)
    {
        $prepareData = $request->all();

        MahasiswaBaru::create($prepareData);

        return redirect('/admin/visualisasi/mahasiswa/baru')->with('success', 'Data <b>' . $request->tahun . '</b> berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MahasiswaBaru $mahasiswaBaru)
    {
        return view('admin.visualisasi.mahasiswa.baru.edit', [
            'title' => 'Admin Edit Mahasiswa Baru',
            'mahasiswaBaru' => $mahasiswaBaru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MahasiswaBaru $mahasiswaBaru)
    {
        $prepareData = $request->all();

        $mahasiswaBaru->update($prepareData);

        return redirect('/admin/visualisasi/mahasiswa/baru')->with('success', 'Data <b>' . $request->tahun . '</b> berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MahasiswaBaru $mahasiswaBaru)
    {
        $mahasiswaBaru->delete();

        return redirect('/admin/visualisasi/mahasiswa/baru')->with('success', 'Data <b>' . $mahasiswaBaru->tahun . '</b> berhasil dihapus');
    }
}
