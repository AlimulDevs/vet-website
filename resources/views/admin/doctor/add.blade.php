@extends('template.index-admin')
@section("title", "Dokter")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form action="/admin/doctor/add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Dokter</label>
                <input type="text" value="" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Dokter</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="photo_url" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo_url" id="photo_url">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No. Whatsapp</label>
                <input type="text" class="form-control" name="no_hp" id="no_hp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- end Form -->
@endsection