@extends('template.index')
@section("title", "Konsultasi")
@section('content')
@foreach ($data_doctor as $dtd)


<!-- Heading -->
<div class="heading">
    <div class="container">
        <p>Konsultasi dengan dokter hewan</p>
        <h3>Jose Vet Clinic Balikpapan</h3>
        <span>Konsultasikan hewan peliharaan Anda dengan dokter kami</span>
    </div>
</div>
<!-- end of Heading -->

<style>

</style>

<script>
    function handleHiddenSubmit() {
        let hiddenButton = document.getElementById('submit-hidden-bayar');
        hiddenButton.click();
    }
</script>

<!-- Form -->
<div class="form" id="form">
    <div class="container">


        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card border-0 shadow py-3 px-3">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-1">
                                    <a href="/user/consultation/detail-index/{{$dtd->id}}" class="back">
                                        <i class="fas fa-backward"></i>
                                    </a>
                                </div>
                                <div class="col-9 text-center">
                                    <h5>Lengkapi Data</h5>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <form action="/user/consultation-payment/add" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{$dtd->id}}">

                            <div class="form-group">
                                <select class="form-control-select" name="pet_id" id="pet_id" required>
                                    <option class="select-option" value="" selected>Pilih Hewan</option>
                                    @foreach ($data_pet as $dtp)
                                    <option class="select-option" value="{{$dtp->id}}">{{$dtp->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" name="complaint" id="complaint" placeholder="Keluhan" required></textarea>
                            </div>
                            <label for="bank">Upload bukti pembayaran:</label>
                            <div class="form-group mt-3">
                                <input type="file" class="form-control" id="proof" name="proof" required>
                            </div>

                            <button class="d-none" id="submit-hidden-bayar" type="submit"></button>
                            <div class="form-group mt-2">
                                <button id="submitButton" type="button" class="btn-disabled " data-bs-toggle="modal" data-bs-target="#confirmModals" disabled>Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const petId = document.getElementById("pet_id");
    const compaint = document.getElementById("complaint");
    const proof = document.getElementById("proof");
    const submitButton = document.getElementById("submitButton");

    compaint.addEventListener("input", checkInput);
    petId.addEventListener("change", checkInput);
    proof.addEventListener("change", checkInput);

    function checkInput() {
        if (compaint.value.trim() !== "" && petId.value !== "" && proof.files.length > 0) {
            submitButton.removeAttribute("disabled");
            submitButton.classList.remove("btn-disabled")

            submitButton.classList.add("form-control-submit-button")
        } else {
            submitButton.setAttribute("disabled", "true");
            submitButton.classList.remove("form-control-submit-button")
            submitButton.classList.add("btn-disabled")
            submitButton.classList.add("text-white")

        }
    }
</script>
<!-- end of form -->


<!-- Modal -->
<div class="modal fade" id="confirmModals" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>




            <div class="modal-body">
                Anda yakin ingin melanjutkan?
            </div>
            <div class="modal-footer">
                <button class="btn-solid-sm" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                <button class="btn-solid-sm" onclick="handleHiddenSubmit()" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Ya</button>
            </div>

        </div>
    </div>
</div>
@push('scripts')


@if (session('success_payment'))
<script>
    let successModal = new bootstrap.Modal(document.getElementById("successModal"));
    successModal.show();
</script>
@endif
@endpush
@if ($message = session('success_payment'))
<div class="modal fade" id="successModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup">
                    <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                    <h1>Pendaftaran Berhasil!</h1>
                    <h3 class="code">Kode Anda: {{str_pad($message, 3, '0', STR_PAD_LEFT)}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- end of modal -->


@endforeach
@endsection