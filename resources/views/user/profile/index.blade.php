@extends('template.index')

@section("title", "Profile")

@section('content')

<!-- Heading -->
<div class="heading">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="image-container">
                    <img src="images/user.svg" class="rounded-circle mb-2" alt=""><br>
                    <label class="btn-solid-sm" href="#" for="file">Ubah gambar</label>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="form-edit-photo-profile" action="/user/edit-photo-profile" method="post" enctype="multipart/form-data">
    @csrf
    <input class="d-none" type="file" name="photo_url" id="file" onchange="submitForm()">
</form>
<script>
    function submitForm() {
        const form = document.getElementById("form-edit-photo-profile");
        form.submit();

    }
</script>
<!-- end of Heading -->
<!-- Form -->
<div id="form-1" class="form-1">
    <div class="container">


        <div class="row mt-5">
            <div class="col-lg-12">

                <form id="form-edit-profile" action="/user/edit-profil" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group text-center">
                        <img src="{{$data_patient->photo_url}}" width="300px" height="300px" class="rounded-circle mb-2" alt="">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="first_name" value="{{$data_patient->first_name}}" placeholder="Arifin" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="last_name" value="{{$data_patient->last_name}}" placeholder="Setyawan" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" name="no_hp" value="{{str_replace('+62','0',$data_patient->no_hp)}}" placeholder="0895705288923" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" name="address" value="{{$data_patient->address}}" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of form -->
@endsection