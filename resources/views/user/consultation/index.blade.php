@extends('template.index')
@section("title", "Konsultasi")
@section('content')

<!-- Heading -->
<div class="heading">
    <div class="container">
        <p>Konsultasi dengan dokter hewan</p>
        <h3>Jose Vet Clinic Balikpapan</h3>
        <span>Konsultasikan hewan peliharaan Anda dengan dokter kami</span>
    </div>
</div>
<!-- end of Heading -->


<!-- Doctor -->
<div id="doctor" class="doctor">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading">Pilih dokter yang tersedia</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                @foreach ($data_doctor as $dtd)


                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img width="200px" height="200px" src="{{$dtd->photo_url}}" alt="alternative">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{$dtd->name}}
                            @if ($dtd->status == true)
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle"></span>
                        </h6>
                        @if ($data_pet == null)
                        <a class="btn-solid-sm mt-3" data-bs-target="#warningModalForPetNull" data-bs-toggle="modal">Chat</a>
                        @elseif ($data_patient->address == null)
                        <a class="btn-solid-sm mt-3" data-bs-target="#warningModalForUserAddressNull" data-bs-toggle="modal">Chat</a>
                        @else
                        <a class="btn-solid-sm mt-3" href="/user/consultation/detail-index/{{$dtd->id}}">Chat</a>
                        @endif



                        @else
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>
                        </h6>
                        <a class="btn-solid-sm disabled mt-3">Offline</a>
                        @endif


                        @if ($dtd->status == true)

                        @else

                        @endif
                    </div>
                </div>
                <!-- end of card -->

                @endforeach



            </div>
        </div>
    </div>
</div>
<!-- end of Doctor -->


<div class="modal fade" id="warningModalForPetNull" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup">
                    <img src="{{asset('warning.svg')}}" alt="">
                    <p>Silakan tambahkan hewan peliharaan Anda untuk melanjutkan konsultasi.</p>
                    <a href="/user/pet-index" class="btn-solid-sm d-flex justify-content-center mt-3">Tambahkan Hewan</a>
                    <!-- <h3 class="code">Kode Anda: 12345</h3> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="warningModalForUserAddressNull" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup">
                    <img src="{{asset('warning.svg')}}" alt="">
                    <p>Silakan isi alamat Anda terlebih dahulu untuk melanjutkan konsultasi.</p>
                    <a href="/user/profile-index" class="btn-solid-sm d-flex justify-content-center mt-3">Tambahkan Alamat</a>
                    <!-- <h3 class="code">Kode Anda: 12345</h3> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection