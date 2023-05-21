@extends('template.index')
@section("title", "Peliharaan")
@section('content')

<!-- Heading -->
<div class="heading">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="dataTable">

                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Hewan</th>
                            <th scope="col">Usia (tahun)</th>
                            <th scope="col">Berat (kg)</th>
                            <th scope="col">Steril</th>
                            <th scope="col">Ras Hewan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_pet as $dtp)
                        <tr class="text-center">
                            <td scope="col">{{$no++}}</td>
                            <td scope="col">{{$dtp->name}}</td>
                            <td scope="col">{{$dtp->age}}</td>
                            <td scope="col">{{$dtp->weight}}</td>
                            @if ($dtp->is_sterile == 1)
                            <td scope="col">Sudah</td>
                            @else
                            <td scope="col">Belum</td>
                            @endif

                            <td scope="col">{{$dtp->race}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="/user/pet/delete/{{$dtp->id}}"><i class="ri-delete-bin-line"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end of Heading -->
<!-- Form -->
<div id="form-1" class="form-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="/user/pet/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-center">
                        <img src="images/user.svg" class="rounded-circle mb-2" alt="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" name="name" placeholder="Nama Hewan" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="age" placeholder="Usia (tahun)" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="weight" placeholder="Berat (kg)" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control-select" name="species" required>
                            <option class="select-option" value="" disabled selected>Spesies</option>
                            <option class="select-option" value="Kucing">Kucing</option>
                            <option class="select-option" value="Anjing">Anjing</option>
                            <option class="select-option" value="Kelinci">Kelinci</option>
                            <option class="select-option" value="Hamster">Hamster</option>
                            <option class="select-option" value="Unggas">Unggas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_sterile" value="1">
                            <label class="form-check-label" for="inlineRadio1">Sudah steril</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_sterile" value="0">
                            <label class="form-check-label" for="inlineRadio2">Belum steril</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" name="race" placeholder="Ras Hewan" required>
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