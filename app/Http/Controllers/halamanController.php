<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class halamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.halaman.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()-> view('dashboard.halaman.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->session()->flash('judul', $request->judul);
        $request->session()->flash('isi', $request->isi);
        
        $request->validate([
            'judul' =>  ' required',
            'isi'   =>  ' required',
        ],
        [
            'judul.required'=>' judul harus di isi',
            'isi.required'=>' isi harus di isi',
        ]
    );

    $data = [
        'judul' => $request-> judul,
        'isi'   => $request-> isi,
    ];
    halaman::create($data);

    return redirect()->route('halaman.index')->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Halaman::find($id);
        return view('dashboard.halaman.edit', compact('data'));
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
        $request->validate([
            'judul' =>  ' required',
            'isi'   =>  ' required',
        ],
        [
            'judul.required'=>' judul harus di isi',
            'isi.required'=>' isi harus di isi',
        ]
    );

    $data = [
        'judul' => $request-> judul,
        'isi'   => $request-> isi,
    ];
    halaman::create('id',$id)->update($data);

    return redirect()->route('halaman.index')->with('success', 'Data Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        halaman::where('id',$id)->delete();
        return redirect()->route('halaman.index')->with('success', 'Data Berhasil Didelete');

    }
}
