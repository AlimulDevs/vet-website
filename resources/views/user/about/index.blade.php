@extends('template.index')
@section("title", "About")
@section('content')
<!-- Mission -->
<div class="mission">
    <div class="container">
        <div class="row">
            <div class="text-container">
                <h4>"Menyediakan dan menjalankan berbagai jenis pelayanan kesehatan dengan dasar berbasis pengetahuan ilmu kedokteran hewan"</h4>
            </div>
        </div>
    </div>
</div>
<!-- end of mission -->

<!-- services -->
<div id="services" class="services bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Layanan Kami</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Konsultasi Online</div>
                        <div class="card-text">Eget ultrices tellus tempor maecenas eget lorem nec magna pharetra mollis integer in nisl efficitur imperdiet lectus a gravida</div>
                    </div>
                </div> <!-- end of card -->
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Reservasi Kunjungan Klinik</div>
                        <div class="card-text">Eget ultrices tellus tempor maecenas eget lorem nec magna pharetra mollis integer in nisl efficitur imperdiet lectus a gravida</div>
                    </div>
                </div> <!-- end of card -->
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Artikel Seputar Hewan</div>
                        <div class="card-text">Eget ultrices tellus tempor maecenas eget lorem nec magna pharetra mollis integer in nisl efficitur imperdiet lectus a gravida</div>
                    </div>
                </div> <!-- end of card -->
                <!-- end of card -->

            </div>
        </div>
    </div>
</div>
<!-- end of services -->


<!-- Facility -->
<div class="facility">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Fasilitas Kami</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($data_facility as $dtf)


            <div class="col-lg-3">
                <img src="{{$dtf->photo_url}}" class="img-fluid" alt="">
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end of Facility -->


<!-- Testimonials -->
<div class="testimonial bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Apa Kata Mereka?</h2>
            </div>
        </div>
        <div class="row">

            @foreach ($data_about as $dta)


            <div class="col-lg-6">
                <ul class="list-unstyled first">
                    <li class="d-flex">
                        <div class="list-image">
                            <img src="{{$dta->photo_url}}" alt="alternative">
                        </div>
                        <div class="flex-grow-1">
                            <div class="testimonial-text">{{$dta->content}}</div>
                            <div class="testimonial-author">{{$dta->name}} - {{$dta->role}}</div>
                        </div>
                    </li>
                </ul>
            </div>

            @endforeach
        </div>
    </div>
</div>
<!-- end of testimonials -->
@endsection