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


<!-- Form -->
<div class="form" id="form">
    <div class="container">

        <div class="row mb-3">
            <div class="col-lg-10 offset-lg-1">

            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">



                <div class="card border-0 shadow py-3 px-3 bg-gray">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-1">
                                    <a href="/user/consultation-index" class="back">
                                        <i class="fas fa-backward"></i>
                                    </a>
                                </div>
                                <div class="col-5 text-center">
                                    <h5>Rincian</h5>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <p>Anda akan melakukan konsultasi dengan:</p>

                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    Dokter
                                </div>
                                <div class="col-2">
                                    <span class="badge bg-secondary">{{$dtd->name}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    Durasi
                                </div>
                                <div class="col-2">
                                    <span class="badge bg-secondary">20 Menit</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    Biaya
                                </div>
                                <div class="col-2">
                                    <span class="badge bg-secondary">Rp50.000,-</span>
                                </div>
                            </div>
                        </div>



                        <p class="mt-3">Pembayaran melalui transfer ke bank berikut</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    BCA : <span id="mySpan"> 0896779368</span> <span><i id="copyButton" class="fas fa-copy ms-1"></i></span>
                                </div>
                                <div class="col-2">
                                    <span class="badge bg-secondary">an. Jose Vet</span>
                                </div>
                            </div>
                        </div>

                        <script>
                            const btnCopy = document.getElementById("copyButton")

                            btnCopy.addEventListener("click", function() {
                                // Get the text content of the span element
                                var spanText = document.getElementById("mySpan").textContent;

                                // Create a temporary textarea element
                                var tempTextarea = document.createElement("textarea");
                                tempTextarea.value = spanText;

                                // Append the textarea element to the document
                                document.body.appendChild(tempTextarea);

                                // Select the text in the textarea
                                tempTextarea.select();

                                // Copy the selected text to the clipboard
                                document.execCommand("copy");

                                // Remove the temporary textarea element
                                document.body.removeChild(tempTextarea);

                                // Provide feedback to the user
                                alert("Text copied to clipboard!");
                            });
                        </script>
                        <!-- <span>Rek : 0896779368 &nbsp;&nbsp;&nbsp;&nbsp; an. Jose Vet Clinic</span> -->

                        <a href="/user/consultation/form-index/{{$dtd->id}}" class="btn-solid-sm mt-4 d-flex justify-content-center">
                            Konfirmasi
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end of form -->
@endforeach
@endsection