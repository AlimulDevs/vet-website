@extends('template.index-admin')
@section("title", "Pelayanan")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form action="/admin/service/edit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="hidden" class="form-control" name="id" value="{{$data_service->id}}">

                <label for="name" class="form-label">Layanan</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$data_service->name}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- end Form -->
@endsection