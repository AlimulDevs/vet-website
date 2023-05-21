@extends('template.index-admin')
@section("title", "Tentang Kami")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form action="/admin/about/add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="role" name="role" required>
            </div>

            <div class="mb-3">
                <label for="photo_url" class="form-label">Foto</label>
                <input type="file" class="form-control" id="photo_url" name="photo_url" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- end Form -->
@endsection