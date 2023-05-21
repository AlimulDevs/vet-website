@extends('template.index-admin')
@section("title", "Fasilitas")
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
            <a class="btn btn-primary btn-sm mb-4" href="/admin/facility/add-index">Tambah</a>
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data_facility as $dtf)


                <tr class="text-center">
                    <td>{{$no++}}</td>
                    <td>{{$dtf->name}}</td>
                    <td>
                        <img src="{{$dtf->photo_url}}" alt="photo_url" width="75px" height="75px">
                    </td>

                    <td>
                        <a class="btn btn-warning btn-sm" href="/admin/facility/edit-index/{{$dtf->id}}"><i class="ri-edit-2-line"></i></a>
                        <a class="btn btn-danger btn-sm" href="/admin/facility/delete/{{$dtf->id}}"><i class="ri-delete-bin-line"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end Table -->
@endsection