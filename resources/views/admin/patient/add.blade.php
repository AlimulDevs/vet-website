@extends('template.index-admin')
@section("title", "Pasient")
@section('content-admin')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form method="post" action="/admin/patient/add">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="email" class="form-control" id="name" name="email" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">No. Whatsapp</label>
                <input type="text" class="form-control" id="whatsapp" name="no_hp" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="pet" class="form-label">Nama Hewan</label>
                <input type="text" class="form-control" id="pet" name="name_pet" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Spesies</label>
                <select class="form-select" aria-label="Default select example" name="species_pet" required>
                    <option selected>Pilih spesies</option>
                    <option value="Kucing">Kucing</option>
                    <option value="Anjing">Anjing</option>
                    <option value="Kelinci">Kelinci</option>
                    <option value="Hamster">Hamster</option>
                    <option value="Unggas">Unggas</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="breeds" class="form-label">Ras</label>
                <input type="text" class="form-control" id="breeds" name="race_pet" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Usia (tahun)</label>
                <input type="text" class="form-control" id="age" name="age_pet" required>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Berat (kg)</label>
                <input type="text" class="form-control" id="weight" name="wight_pet" required>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Pelayanan</label>
                <select name="service" id="service" class="form-select">
                    <option value="">-- Pelayanan --</option>
                    @foreach ($data_service as $dts)
                    <option value="{{$dts->name}}">{{$dts->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="problem" class="form-label">Keluhan</label>
                <textarea class="form-control" name="complaint" id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="datetime-local" class="form-control" id="date" name="date_time" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- end Form -->
@endsection