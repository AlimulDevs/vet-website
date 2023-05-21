@extends('template.index-admin')
@section("title", "Pasient")
@section('content-admin')
@foreach ($data_reservation as $dtr)


<!-- Form -->
<div class="card border-0 shadow py-3">
    <div class="card-body">
        <form method="post" action="/admin/patient/record-add">
            @csrf

            <input type="hidden" name="reservation_id" value="{{$dtr->id}}">
            <div class="mb-3">
                <label for="name" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="date" id="name" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Dokter</label>
                <select name="doctor_id" id="doctor" class="form-select">
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($data_doctor as $dtd)
                    <option value="{{$dtd->id}}">{{$dtd->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="problem" class="form-label">Catatan</label>
                <textarea class="form-control" name="notes" id="" cols="30" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endforeach
<!-- end Form -->
@endsection