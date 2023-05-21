@extends('template.index-admin')
@section("title", "Pasient")
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
            <a href="/admin/patient/add-index" class="btn btn-primary btn-sm mb-4">Tambah</a>
            <thead>
                <tr class="text-center">
                    <th scope="col">Kode</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">No. Whatsapp</th>
                    <th scope="col">Nama Hewan</th>
                    <th scope="col">Spesies</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_reservation as $dtr)


                <tr class="text-center">
                    <td>{{str_pad($dtr->id, 3, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$dtr->patient->first_name}} {{$dtr->patient->last_name}}</td>
                    <td>{{str_replace('+62','0',$dtr->patient->no_hp)}}</td>
                    <td>{{$dtr->pet->name}}</td>
                    <td>{{$dtr->pet->species}}</td>
                    <td>{{date('d M Y', strtotime($dtr->date))}}</td>
                    <td>{{$dtr->service}}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="/admin/patient/detail-index/{{$dtr->id}}"><i class="ri-booklet-line"></i></a>
                        <a class="btn btn-success btn-sm" href="https://api.whatsapp.com/send?phone={{$dtr->patient->no_hp}}&text=Halo%20{{$dtr->patient->first_name}}%20{{$dtr->patient->last_name}}%20apa%20kabar%3F"><i class="ri-whatsapp-line"></i></a>
                        <a class="btn btn-danger btn-sm" href="#"><i class="ri-delete-bin-line"></i></a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end Table -->
@endsection