@extends('template.index-admin')
@section("title", "Konsultasi")
@section('content-admin')
@foreach ($data_consultation as $dtc)


<!-- Card -->
<div class="card py-3 shadow border-0">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5><strong>Kode Pasien :</strong> <span class="badge bg-secondary">{{str_pad($dtc->id, 3, '0', STR_PAD_LEFT)}}</span></h5>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <p>Pemilik : <strong>{{$dtc->patient->first_name}} {{$dtc->patient->last_name}}</strong></p>
                    <p>No. Whatsapp : <strong>{{$dtc->patient->no_hp}}</strong></p>
                    <p>Alamat : <strong>{{$dtc->patient->address}}</strong></p>
                </div>
                <div class="col-lg-2">
                    <p>Pasien : <strong>{{$dtc->pet->name}}</strong></p>
                    <p>Spesies : <strong>{{$dtc->pet->species}}</strong></p>
                    <p>Ras : <strong>{{$dtc->pet->race}}</strong></p>
                </div>
                <div class="col-lg-2">
                    @if ($dtc->pet->is_sterile)
                    <p>Sterilisasi : <span class="badge bg-success">sudah</span></p>
                    @else
                    <p>Sterilisasi : <span class="badge bg-danger">belum</span></p>
                    @endif

                    <p>Usia (tahun) : <strong>{{$dtc->pet->age}}</strong></p>
                    <p>Berat (kg) : <strong>{{$dtc->pet->weight}}</strong></p>
                </div>
                <div class="col-lg-4">
                    <p>Dokter : <strong>{{$dtc->doctor->name}}</strong></p>
                    <p>Tanggal : <strong>{{$dtc->date}}</strong></p>
                    <p>Waktu : <strong>{{$dtc->hour}}</strong></p>
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
                    <p>{{$dtc->complaint}}</p>
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
                    <p>{{$dtc->doctor_note}}</p>
                    <p class="mt-5">Resep Obat :</p>
                    <p>{{$dtc->recipe}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Card -->
<a class="btn btn-primary btn-sm mt-3" href="/admin/consultation-index">Tutup</a>
@endforeach
@endsection