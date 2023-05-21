@extends('template.index-admin')
@section("title", "Dokter")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form action="/admin/doctor/edit" method="post" enctype="multipart/form-data">
            @csrf
            @foreach ($data_doctor as $dtd)
            <input type="hidden" name="id" value="{{$dtd->id}}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Dokter</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$dtd->name}}" required>
            </div>

            <div class="mb-3">
                <label for="photo_url" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo_url" id="photo_url">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No. Whatsapp</label>
                <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{$dtd->no_hp}}" required>
            </div>


            @endforeach
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- end Form -->
@endsection