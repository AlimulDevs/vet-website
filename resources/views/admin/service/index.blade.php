@extends('template.index-admin')
@section("title", "Pelayanan")
@section('content-admin')
<!-- Table -->
<div class="card border-0 shadow">
    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <a class="btn btn-primary btn-sm mb-4" href="/admin/service/add-index">Tambah</a>
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no =1
                @endphp
                @foreach ($data_service as $dts)


                <tr class="text-center">
                    <td>{{$no++}}</td>
                    <td>{{$dts->name}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="/admin/service/edit-index/{{$dts->id}}"><i class="ri-edit-2-line"></i></a>
                        <a class="btn btn-danger btn-sm" href="/admin/service/delete/{{$dts->id}}"><i class="ri-delete-bin-line"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end Table -->
@endsection