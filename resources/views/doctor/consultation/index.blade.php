@extends('template.index-doctor')
@section("title", "Konsultasi")
@section('content-doctor')
<!-- Summary -->

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
            <thead>
                <tr class="text-center">
                    <th scope="col">Kode</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Nama Hewan</th>
                    <th scope="col">No. Whatsapp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_consultation as $dtc)


                <tr class="text-center">
                    <td>{{str_pad($dtc->id, 3, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$dtc->patient->first_name}} {{$dtc->patient->last_name}}</td>
                    <td>{{$dtc->pet->name}} </td>
                    <td>{{$dtc->patient->no_hp}} </td>
                    @if (!$dtc->patient->address)
                    <td>Alamat belum di isi</td>
                    @else
                    <td>{{$dtc->patient->address}} </td>
                    @endif

                    <td><span class="badge bg-secondary">{{$dtc->status}} </span></td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="/doctor/consultation/detail-index/{{$dtc->id}}"><i class="ri-information-line"></i></a>
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