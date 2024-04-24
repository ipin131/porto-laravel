@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('halaman.index') }}" class="btn btn-secondary">
            << Kembali </a>
    </div>
    <form action="{{ route('halaman.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="judul"
                id="judul"
                aria-describedby="helpId"
                placeholder="Judul" value="{{Session::get('judul')}}"
            />
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control summernote" name="isi" id="isi" rows="5" >{{Session::get('isi')}}</textarea>
        </div>
        <button class="btn btn-primary" name="Simpan" type="submit">SIMPAN</button>
    </form>
@endsection
