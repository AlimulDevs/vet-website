@extends('template.index-doctor')
@section("title", "Reservasi")
@section('content-doctor')

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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Penjemputan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data_reservation as $dtr)


                <tr class="text-center">
                    <td>{{str_pad($dtr->id, 3, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$dtr->patient->first_name}} {{$dtr->patient->last_name}}</td>
                    <td>{{$dtr->pet->name}}</td>
                    <td>{{$dtr->patient->no_hp}}</td>
                    <td>{{$dtr->date}}</td>
                    <td>{{$dtr->hour}}:{{$dtr->minute}}</td>
                    <td>{{$dtr->service}}</td>
                    <td>{{$dtr->pickup}}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="/doctor/reservation/detail-index/{{$dtr->id}}"><i class="ri-information-line"></i></a>
                        <a class="btn btn-danger btn-sm" href="/doctor/reservation/delete/{{$dtr->id}}"><i class="ri-delete-bin-line"></i></a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
<!-- end Table -->

@endsection