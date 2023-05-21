@extends('template.index')
@section("title", "Histori")
@section('content')
@foreach ($data_consultation as $dtc)
@foreach ($data_consultation as $dtc)


<!-- Form -->
<div id="form" class="form">
    <div class="container">

        <div class="pets text-center">
            <img src="images/z.jpg" width="90" class="img-fluid rounded-circle" alt="">
            <p class="mt-3"><span class="badge bg-secondary">{{$dtc->pet->name}}</span></p>
        </div>

        <div class="card py-3 mt-4 shadow border-0">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Keluhan :</p>
                            <p>{{$dtc->complaint}}</p>

                            <p class="mt-5">Catatan Dokter :</p>
                            <p>{{$dtc->doctor_note}}</p>

                            <p class="mt-5">Resep Obat :</p>
                            <p>{{$dtc->recipe}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endforeach
<!-- end of form -->
@endforeach
@endsection