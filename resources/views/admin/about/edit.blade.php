@extends('template.index-admin')
@section("title", "Tentang Kami")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form action="/admin/about/edit" method="post" enctype="multipart/form-data">
            @csrf

            @foreach ($data_about as $dta)
            <input type="hidden" name="id" value="{{$dta->id}}">

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$dta->name}}" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="role" name="role" value="{{$dta->role}}" required>
            </div>

            <div class="mb-3">
                <label for="photo_url" class="form-label">Foto</label>
                <input type="file" class="form-control" id="photo_url" name="photo_url">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10" required>{{$dta->content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            @endforeach
        </form>
    </div>
</div>
<!-- end Form -->
@endsection