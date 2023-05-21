@extends('template.index-admin')
@section("title", "Tentang Kami")
@section('content-admin')


@if (session("success_delete"))
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        Berhasil Menghapus
    </div>
</div>
@endif

@if (session("success_edit"))
<div class="alert alert-warning d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        Berhasil Mengubah
    </div>
</div>
@endif

@if (session("success_create"))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
    </svg>
    <div>
        An example success alert with an icon
    </div>
</div>
@endif
<!-- Table -->
<div class="card border-0 shadow">
    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <a class="btn btn-primary btn-sm mb-4" href="/admin/about/add-index">Tambah</a>
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no =1
                @endphp
                @foreach ($data_about as $dta)


                <tr class="text-center">
                    <td>{{$no++}}</td>
                    <td>{{$dta->name}}</td>
                    <td>
                        <img src="{{$dta->photo_url}}" alt="photo_url" width="75px" height="75px">
                    </td>
                    <td>{{$dta->role}}</td>
                    <td>{{$dta->content}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="/admin/about/edit-index/{{$dta->id}}"><i class="ri-edit-2-line"></i></a>
                        <a class="btn btn-danger btn-sm" href="/admin/about/delete/{{$dta->id}}"><i class="ri-delete-bin-line"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end Table -->
@endsection