<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\session;

class educationController extends Controller
{
    function __construct()
    {
        $this->_tipe = 'education';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::where('tipe',$this->_tipe )->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> session()->flash('judul', $request->judul);
        $request-> session()->flash('info1', $request->info1);
        $request-> session()->flash('tgl_mulai', $request->tgl_mulai);
        $request-> session()->flash('tgl_akhir', $request->tgl_akhir);
        $request-> session()->flash('isi', $request->isi);
        
        $request->validate([
            'judul' =>  ' required',
            'isi'   =>  ' required',
            'info1' =>  ' required',
            'tgl_mulai' =>  ' required',

        ],
        [
            'judul.required'=>' judul harus di isi',
            'isi.required'=>' isi harus di isi',
            'info1.required'=>' info1 harus di isi',
            'tgl_mulai.required'=>' tgl_mulai harus di isi',
        ]
    );

    $data = [
        'judul' => $request-> judul,
        'isi'   => $request-> isi,
        'info1' => $request-> info1,
        'tgl_mulai' => $request-> tgl_mulai,
        'tgl_akhir' => $request-> tgl_akhir,
        'tipe' => $this->_tipe,
    ];
    riwayat::create($data);

    return redirect()->route('education.index')->with('success', 'Experience Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = riwayat::where('id',$id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.education.index')->with('data', $data );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = SomeModel::findOrFail($id);
            $data->update($request->all());
            return redirect()->route('some.route');
        } catch (\Exception $e) {
            Log::error('Gagal mengupdate data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id',$id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('education.index')->with('success', 'experience Berhasil Didelete');
    }
}
