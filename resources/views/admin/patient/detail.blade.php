@extends('template.index-admin')
@section("title", "Pasient")
@section('content-admin')

@foreach ($data_reservation as $dtr)


<!-- Card -->
<div class="card py-3 shadow border-0">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5><strong>Kode Pasien :</strong> <span class="badge bg-secondary">001</span></h5>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <p>Pemilik : <strong>{{$dtr->patient->first_name}} {{$dtr->patient->last_name}}</strong></p>
                    <p>No. Whatsapp : <strong>{{str_replace('+62','0',$dtr->patient->no_hp)}}</strong></p>
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
                    <p>Tanggal : <strong>{{date('d M Y', strtotime($dtr->date))}}</strong></p>
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
                    <a href="/admin/patient/medical-record/{{$dtr->id}}" class="btn btn-primary btn-sm mb-4">Tambah</a>
                    <p><strong>Rekam Medis :</strong></p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dtr->medical_record as $dtrmc)


                            <tr>
                                <td>{{date('d M Y',strtotime($dtrmc->date))}}</td>
                                <td>{{$dtrmc->doctor->name}}</td>
                                <td>{{$dtrmc->notes}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="card py-3 mt-2 shadow border-0">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Catatan Dokter :</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia impedit ut error adipisci, molestiae consequuntur aliquam voluptatem quos laudantium veniam ratione nemo debitis nisi distinctio et similique soluta. Minus corrupti voluptatibus non nam quod? Repellendus illum pariatur tenetur incidunt temporibus.</p>
                                    <p class="mt-5">Resep Obat :</p>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis cumque libero deleniti numquam, ut fugiat dicta labore ex quasi commodi?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
<!-- end Card -->
<a class="btn btn-primary btn-sm mt-3" href="/admin/patient-index">Tutup</a>
@endforeach
@endsection