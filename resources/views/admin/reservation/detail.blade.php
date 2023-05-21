@extends('template.index-admin')
@section("title", "Reservasi")
@section('content-admin')

@foreach ($data_reservation as $dtr)
<!-- Card -->
<div class="card py-3 shadow border-0">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5><strong>Kode Pasien :</strong> <span class="badge bg-secondary">{{$dtr->id}}</span></h5>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <p>Pemilik : <strong>{{$dtr->patient->first_name}} {{$dtr->patient->last_name}}</strong></p>
                    <p>No. Whatsapp : <strong>{{$dtr->patient->no_hp}}</strong></p>
                    <p>Alamat : <strong>{{$dtr->patient->address}}</strong></p>
                </div>
                <div class="col-lg-2">
                    <p>Pasien : <strong>{{$dtr->pet->name}}</strong></p>
                    <p>Spesies : <strong>{{$dtr->pet->species}}</strong></p>
                    <p>Ras : <strong>{{$dtr->pet->race}}</strong></p>
                </div>
                <div class="col-lg-2">
                    @if ($dtr->is_sterile == 1)
                    <p>Sterilisasi : <span class="badge bg-success">sudah</span></p>
                    @else
                    <p>Sterilisasi : <span class="badge bg-danger">belum</span></p>
                    @endif

                    <p>Usia (tahun) : <strong>{{$dtr->pet->age}}</strong></p>
                    <p>Berat (kg) : <strong>{{$dtr->pet->weight}}</strong></p>
                </div>
                <div class="col-lg-4">
                    <p>Dokter : <strong>drh. Kama</strong></p>
                    <p>Tanggal : <strong>{{$dtr->date}}</strong></p>
                    <p>Waktu : <strong>{{$dtr->hour}}.{{$dtr->minute}} WITA</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card py-3 mt-2 shadow border-0">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Keluhan :</p>
                    <p>{{$dtr->complaint}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card py-3 mt-2 shadow border-0">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Catatan Dokter :</p>
                    <p>{{$dtr->doctor_note}}</p>
                    <p class="mt-5">Resep Obat :</p>
                    <p>{{$dtr->recipe}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Card -->
<a class="btn btn-primary btn-sm mt-3" href="/admin/reservation-index">Tutup</a>
@endforeach
@endsection