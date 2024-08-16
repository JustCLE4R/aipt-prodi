<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(){
        $dokumenCount = Dokumen::query();

        if (Auth::user()->role == 'superadmin') {
            $dokumenCount = $dokumenCount->count();
        } else {
            $dokumenCount = $dokumenCount->whereHas('user.programStudi', function ($query) {
                $query->where('id', Auth::user()->programStudi->id);
            })->count();
        }

        return view('index', [
            'dokumenCount' => $dokumenCount,
        ]);
    }
}
