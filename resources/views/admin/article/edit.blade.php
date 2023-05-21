@extends('template.index-admin')
@section("title", "Artikel")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form action="/admin/article/edit" method="post" enctype="multipart/form-data">
            @csrf
            @foreach ($data_article as $dta)
            <input type="hidden" name="id" value="{{$dta->id}}">

            <div class="mb-3">
                <label for="title" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$dta->title}}" required>
            </div>

            <div class="mb-3">
                <label for="author_name" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="author_name" name="author_name" value="{{$dta->author_name}}" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Kategori</label>
                <select class="form-select" aria-label="Default select example" name="category_article_id" required>
                    <option selected value="{{$dta->category_article_id}}">{{$dta->category_article->name}}</option>
                    @foreach ($data_category_article as $dtca)
                    <option value="{{$dtca->id}}">{{$dtca->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="image_url" name="image_url">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="content" id="" cols="30" rows="10" required>{{$dta->content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            @endforeach
        </form>
    </div>
</div>
<!-- end Form -->
@endsection