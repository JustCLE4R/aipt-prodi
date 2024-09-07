<?php

namespace App\Http\Controllers\admin\visualisasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\visualisasi\MahasiswaLulusan;
use App\Http\Requests\admin\visualisasi\MahasiswaLulusanRequest;
use App\Http\Requests\admin\visualisasi\UpdateMahasiswaLulusanRequest;

class MahasiswaLulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswaLulusans = MahasiswaLulusan::where('user_id', Auth::user()->id)->get();

        return view('admin.visualisasi.mahasiswa.lulusan.index',[
            'title' => 'Mahasiswa Lulusan',
            'mahasiswaLulusans' => $mahasiswaLulusans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visualisasi.mahasiswa.lulusan.create', [
            'title' => 'Admin Tambah Mahasiswa Lulusan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MahasiswaLulusanRequest $request)
    {
        $prepareData = $request->all();

        MahasiswaLulusan::create($prepareData);

        return redirect('/admin/visualisasi/mahasiswa/lulusan')->with('success', 'Data <b>' . $request->tahun . '</b> berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MahasiswaLulusan $mahasiswaLulusan)
    {
        return view('admin.visualisasi.mahasiswa.lulusan.edit', [
            'title' => 'Admin Edit Mahasiswa Lulusan',
            'mahasiswaLulusan' => $mahasiswaLulusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaLulusanRequest $request, MahasiswaLulusan $mahasiswaLulusan)
    {
        $prepareData = $request->all();

        $mahasiswaLulusan->update($prepareData);

        return redirect('/admin/visualisasi/mahasiswa/lulusan')->with('success', 'Data <b>' . $request->tahun . '</b> berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MahasiswaLulusan $mahasiswaLulusan)
    {
        $mahasiswaLulusan->delete();

        return redirect('/admin/visualisasi/mahasiswa/lulusan')->with('success', 'Data <b>' . $mahasiswaLulusan->tahun . '</b> berhasil dihapus');
    }
}
