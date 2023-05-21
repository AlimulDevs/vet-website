@extends("template.index-doctor")

@section("title", "Profile")
@section("content-doctor")
@foreach ($data_doctor as $dtd)

@if (session("success_delete"))
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        Berhasil Menghapus
    </div>
</div>
@endif

@if (session("success_edit"))
<div class="alert alert-warning d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        Berhasil Mengubah
    </div>
</div>
@endif

@if (session("success_create"))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
    </svg>
    <div>
        An example success alert with an icon
    </div>
</div>
@endif

<!-- profile -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <label for="file" class="btn btn-warning fw-bold text-white">Ubah Gambar</label>


        <form id="form-edit-photo" action="/doctor/profile/edit-photo" method="post" enctype="multipart/form-data">
            @csrf
            <input class="d-none" type="file" id="file" name="photo_url" onchange="submitPhotoProfile()">
        </form>
        <script>
            function submitPhotoProfile() {
                const formEdit = document.getElementById("form-edit-photo");
                formEdit.submit();
            }
        </script>

        <form action="/doctor/profile/edit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5 text-center">
                <img src="{{$dtd->photo_url}}" width="150" height="150" class="rounded-circle" alt="">
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="drh. Kama" value="{{$dtd->name}}" required>
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$dtd->user->email}}" placeholder="-" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="whatsapp" class="form-label">No. Whatsapp</label>

                <input type="text" name="no_hp" class="form-control" id="whatsapp" value="{{str_replace('+62','0', $dtd->no_hp)}}" placeholder="0895705288923" required>
            </div>
            <div class="form-check form-switch mb-5">

                <input class="form-check-input" name="status" type="checkbox" value="{{$dtd->status}}" role="switch" id="flexSwitchCheckDefault">

                <label class="form-check-label" id="textFlexSwitchCheckDefault" for="flexSwitchCheckDefault">Offline</label>

            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- end profile -->

<script>
    const checkBox = document.getElementById("flexSwitchCheckDefault");
    const labelCheckBox = document.getElementById("textFlexSwitchCheckDefault");
    if (checkBox.value == 0) {
        labelCheckBox.textContent = "Offline";
        checkBox.checked = false;
    } else {
        labelCheckBox.textContent = "Online";
        checkBox.checked = true;
    }
    checkBox.addEventListener("change", function() {


        if (!checkBox.checked) {
            checkBox.value = 0;
            labelCheckBox.textContent = "Offline";
        } else {
            checkBox.value = 1;
            labelCheckBox.textContent = "Online";
        }
    });
</script>

@endforeach
@endsection