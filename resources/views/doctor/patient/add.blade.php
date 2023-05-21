@extends('template.index-doctor')
@section("title", "Pasien")
@section('content-doctor')
<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">No. Whatsapp</label>
                <input type="text" class="form-control" id="whatsapp" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" required>
            </div>
            <div class="mb-3">
                <label for="pet" class="form-label">Nama Hewan</label>
                <input type="text" class="form-control" id="pet" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Spesies</label>
                <select class="form-select" aria-label="Default select example" required>
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
                <input type="text" class="form-control" id="breeds" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Usia (tahun)</label>
                <input type="text" class="form-control" id="age" required>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Berat (kg)</label>
                <input type="text" class="form-control" id="weight" required>
            </div>
            <div class="mb-3">
                <label for="problem" class="form-label">Keluhan</label>
                <textarea class="form-control" name="" id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="datetime-local" class="form-control" id="date" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- end Form -->
@endsection