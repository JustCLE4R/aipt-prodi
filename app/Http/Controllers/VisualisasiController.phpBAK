<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisualisasiController extends Controller
{
    public function show($status, $jenjang){
        $checkStatus = [
            'calon-mahasiswa',
            'mahasiswa-baru',
            'mahasiswa-aktif',
            'mahasiswa-lulusan',
            'rasio-kelulusan',
        ];
        $checkJenjang = [
            'S1',
            'S2',
            'S3',
            'Profesi',
        ];

        if (!in_array($status, $checkStatus) || !in_array($jenjang, $checkJenjang)) {
            abort(404);
        }

        return view('visualisasi.mahasiswa.'.$status, ['jenjang' => $jenjang]);
    }
}
