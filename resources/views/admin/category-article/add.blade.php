@extends('template.index-admin')
@section("title", "Kategori Artikel")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form action="/admin/category-article/add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Kategori</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- end Form -->
@endsection