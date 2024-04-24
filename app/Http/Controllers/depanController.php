<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\riwayat;
use Illuminate\Http\Request;

class depanController extends Controller
{
    public function index()
    {   
        $about_id = get_meta_value('_halaman_about');
        $about_data = halaman::where('id',$about_id)->first();

        $experience_data= riwayat::where('tipe','experience')->get();

        return view('depan.index')->with
        (['about' => $about_data,
        'experience' => $experience_data
        
    ]);
    }
}
