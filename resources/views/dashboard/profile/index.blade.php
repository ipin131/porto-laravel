
@extends('dashboard.layout')

@section('konten')

    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Profile</h3>
        <div class="row justify-content-between">
            @if (get_meta_value('_foto'))
                <img style="max-width: :20px;max-height: :50px;" src="{{asset('foto') . "/" . get_meta_value('_foto')}}">
            @endif
                <div class="col-5">
                <div class="mb-3">
                <label for="_foto" class="form-label">Foto</label>
                <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">
                </div> 
        <div class="col-5">
                <div class="mb-3">
                <label for="_kota" class="form-label">Kota</label>
                <input type="text" class="form-control form-control-sm" name="_kota" id="_kota" value="{{get_meta_value('_kota')}}">
            </div>
            <div class="mb-3">
                <label for="_provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control form-control-sm" name="_provinsi" id="_provinsi" value="{{get_meta_value('_provinsi')}}">
            </div>
            <div class="mb-3">
                <label for="_negara" class="form-label">Negara</label>
                <input type="text" class="form-control form-control-sm" name="_negara" id="_negara" value="{{get_meta_value('_negara')}}">
            </div>
            <div class="mb-3">
                <label for="_nohp" class="form-label">Nomor Hp</label>
                <input type="text" class="form-control form-control-sm" name="_nohp" id="_nohp" value="{{get_meta_value('_nohp')}}">
            </div>
            <div class="mb-3">
                <label for="_email" class="form-label">Email</label>
                <input type="text" class="form-control form-control-sm" name="_email" id="_email" value="{{get_meta_value('_email')}}">
            </div>
    </div>                
          <div class="mb-3">
                </div>
            </div>

            <div class="col-5">
                <h3>Akun Media Sosial</h3>
                <div class="mb-3">
                    <label for="_twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control form-control-sm" name="_twitter" id="_github" value="{{get_meta_value('_twitter')}}">
                </div>
                <div class="mb-3">
                    <label for="_linkedin" class="form-label">Linkedin</label>
                    <input type="text" class="form-control form-control-sm" name="_linkedin" id="_linkedin" value="{{get_meta_value('_linkedin')}}">
                </div>
                <div class="mb-3">
                    <label for="_github" class="form-label">Github</label>
                    <input type="text" class="form-control form-control-sm" name="_github" id="_github" value="{{get_meta_value('_github')}}">
                </div>
            </div>
        
        
        
        <button class="btn btn-primary " name="simpan" type="submit">SIMPAN</button>

    </form>


@endsection
