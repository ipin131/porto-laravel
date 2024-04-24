<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    function index()
        {
            return view('dashboard.profile.index');
        }
        function update(Request $request)
        {
            $request->validate([
                '_foto' => 'mimes:jpg,jpeg,png,gif',
                '_email'   =>  ' required|email',
              
            ],
            [
                '_foto.mimes'=>' foto harus di isi',
                '_email.email'=>' email harus di isi',
            ]);

            if ($request->hasFile('_foto')) {
                $foto_file = $request->file('_foto');
                $foto_eksistensi = $foto_file->extension();
                $foto_baru = date('YmdHis').".".$foto_eksistensi;
                $foto_file->move(public_path('foto'), $foto_baru); //move->file('_foto')->storeAs('public/profile', $foto_baru);
                //update photo
                $foto_lama = get_meta_value('_foto');
                File::delete(public_path('foto') . "/" . $foto_lama);

                metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
            }
            metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
            metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
            metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
            metadata::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);
            metadata::updateOrCreate(['meta_key' => '_negara'], ['meta_value' => $request->_negara]);


            metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);
            metadata::updateOrCreate(['meta_key' => '_twitter'], ['meta_value' => $request->_twitter]);
            metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);
            

            return redirect()->route('profile.index')->with('success', 'Data Berhasil Diupdate');
        }

    
}
 