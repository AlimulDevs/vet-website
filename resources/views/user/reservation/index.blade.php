@extends('template.index')
@section("title", "Reservasi")
@section('content')

<div class="heading">
    <div class="container">
        <p>Datang tanpa antri</p>
        <h3>Jose Vet Clinic Balikpapan</h3>
        <span>Rencanakan kedatangan Anda ke klinik kami</span>
    </div>
</div>
<!-- end of Heading -->


<!-- Form -->
<div class="form" id="form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">

                <div class="card border-0 shadow py-5 px-5">
                    <div class="card-body">
                        <form action="/user/reservation/add" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <select class="form-control-select" name="pet_id" id="pet_id" required>
                                    <option class="select-option" id="" disabled selected>Pilih Hewan</option>
                                    @foreach ($data_pet as $dtp)
                                    <option class="select-option" value="{{$dtp->id}}" id="{{$dtp->name}}">{{$dtp->name}}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control-select" name="service" id="service" required>
                                    <option class="select-option" value="" disabled selected>Layanan</option>

                                    @foreach ($data_service as $dts)
                                    <option class="select-option" value="{{$dts->name}}">{{$dts->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control-input" id="date_time" name="date_time" placeholder="Pilih tanggal" required>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="pickup" type="checkbox" id="inlineCheckbox1" value="tidak">
                                    <label class="form-check-label" for="inlineCheckbox1">Layanan penjemputan
                                        hewan</label>
                                </div>
                            </div>

                            <script>
                                const checkInput = document.getElementById("inlineCheckbox1");
                                checkInput.addEventListener("change", function() {
                                    if (!checkInput.checked) {
                                        checkInput.value = "tidak";

                                    } else {
                                        checkInput.value = "ya";

                                    }

                                })
                            </script>

                            <button type="submit" class="d-none" id="submitReservation"></button>
                            <div class="form-group mt-5">
                                <button class="btn-disabled" type="button" onclick="handleModalConfirmButton()" id="konfirm" data-bs-target="#detailmModal" data-bs-toggle="modal" disabled>Reservasi sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    const pet = document.getElementById("pet_id");
                    const service = document.getElementById("service");
                    const date = document.getElementById("date_time");
                    const confirmButton = document.getElementById("konfirm")

                    pet.addEventListener("change", requiredInput)
                    service.addEventListener("change", requiredInput)
                    date.addEventListener("change", requiredInput)

                    function requiredInput() {
                        if (pet.value !== "" && service.value !== "" && date.value !== "") {
                            confirmButton.removeAttribute("disabled");
                            confirmButton.classList.remove("btn-disabled")
                            confirmButton.classList.add("form-control-submit-button")
                        } else {
                            confirmButton.setAttribute("disabled", "true");
                            confirmButton.classList.remove("form-control-submit-button")
                            confirmButton.classList.add("btn-disabled")

                        }
                    }

                    function handleModalConfirmButton() {



                        const petNameConfirm = document.getElementById("name_confirm");
                        const serviceConfirm = document.getElementById("service_confirm");
                        const dateConfirm = document.getElementById("date_confirm");


                        petNameConfirm.innerHTML = pet.options[pet.selectedIndex].id;
                        serviceConfirm.innerHTML = service.options[service.selectedIndex].value
                        dateConfirm.innerHTML = date.value;

                    }

                    function handleConfirmButton() {
                        const submitButton = document.getElementById("submitReservation");
                        submitButton.click();
                    }
                </script>

                <!-- Modal -->
                <div class="modal fade" id="detailmModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Rincian reservasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Nama Hewan : <span id="name_confirm"></span></p>
                                <p>Tanggal : <span id="date_confirm"></span></p>
                                <p>Layanan : <span id="service_confirm"></span></p>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                <button class="btn btn-primary btn-sm" onclick="handleConfirmButton()">Konfirmasi</button>
                            </div>
                        </div>
                    </div>
                </div>
                s

                @push('scripts')


                @if (session('success_create'))
                <script>
                    let successModal = new bootstrap.Modal(document.getElementById("successModal"));
                    successModal.show();
                </script>
                @endif
                @if (session('failed_create'))
                <script>
                    let failedModal = new bootstrap.Modal(document.getElementById("failedModal"));
                    failedModal.show();
                </script>
                @endif
                @endpush
                @if ($message = session('success_create'))
                <div class="modal fade" id="successModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="popup">
                                    <img src="{{asset('success.svg')}}" alt="">
                                    <h1>Reservasi Berhasil!</h1>
                                    <h3 class="code">Kode Anda: {{str_pad($message, 3, '0', STR_PAD_LEFT)}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if ($message = session('failed_create'))
                <div class="modal fade" id="failedModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="popup">
                                    <img src="{{asset('error.svg')}}" alt="">
                                    <h1>Reservasi Gagal!</h1>
                                    <h3 class="code">Jadwal sudah di pesan!! Pilih jadwal lain</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<!-- end of form -->
@endsection