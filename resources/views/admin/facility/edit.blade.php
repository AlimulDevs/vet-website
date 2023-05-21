@extends('template.index-admin')
@section("title", "Fasilitas")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form action="/admin/facility/edit" method="post" enctype="multipart/form-data">
            @csrf
            @foreach ($data_facility as $dtf)
            <input type="hidden" name="id" value="{{$dtf->id}}">

            <div class="mb-3">
                <label for="name" class="form-label">Nama Fasilitas</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$dtf->name}}" required>
            </div>
            <div class="mb-3">
                <label for="photo_url" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="photo_url" name="photo_url">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            @endforeach
        </form>
    </div>
</div>
<!-- end Form -->
@endsection