@extends('template.index')
@section("title", "Histori")
@section('content')

<!-- Heading -->
<div class="heading">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="image-container">


                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of Heading -->
<!-- Form -->
<div id="form-1" class="form-1">
    <div class="container">






        @foreach ($data_consultation as $dtc)


        <div class="card py-4 px-4 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <strong>{{date('d M Y', strtotime($dtc->date))}}</strong>
                    </div>
                    <div class="col-3">
                        <strong>{{$dtc->pet->name}}</strong><br>
                        <small>Konsultasi</small>
                    </div>
                    <div class="col-3">
                        {{$dtc->doctor->name}}
                    </div>
                    <div class="col-3">
                        @if ($dtc->status =="Selesai")
                        <a href="/user/history/detail-index/{{$dtc->id}}" class="btn-solid-sm">Buka</a>
                        @elseif ($dtc->status =="Baru")
                        <a class="btn-solid-sm disabled">Tutup</a>
                        @elseif ($dtc->status =="Pending")
                        <a class="btn-solid-sm disabled">Proses</a>
                        @elseif ($dtc->status =="Gagal")
                        <a class="btn-solid-sm bg-danger">Gagal</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($data_reservation as $dtr)
        <div class="card py-4 px-4 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <strong>{{date('d M Y', strtotime($dtr->date))}}</strong>
                    </div>
                    <div class="col-3">
                        <strong>{{$dtr->pet->name}}</strong><br>
                        <small>Reservasi</small>
                    </div>
                    <div class="col-3">
                        {{$dtr->service}}
                    </div>
                    <div class="col-3">
                        @if ($dtr->recipe == null)
                        <td><span class="badge bg-secondary">akan datang</span></td>
                        @else
                        <td><span class="badge bg-success">selesai</span></td>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- end of form -->
@endsection