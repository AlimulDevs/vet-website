@extends('template.index-doctor')
@section("title", "Pasien")
@section('content-doctor')
<!-- Card -->
<div class="card py-3 shadow border-0">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5><strong>Kode Pasien :</strong> <span class="badge bg-secondary">001</span></h5>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <p>Pemilik : <strong>Arifin Setyawan</strong></p>
                    <p>No. Whatsapp : <strong>0895705288923</strong></p>
                    <p>Alamat : <strong>Jl. Mayjend Sutoyo No.50 RT.49</strong></p>
                </div>
                <div class="col-lg-2">
                    <p>Pasien : <strong>Ciko</strong></p>
                    <p>Spesies : <strong>Kucing</strong></p>
                    <p>Ras : <strong>Persia</strong></p>
                </div>
                <div class="col-lg-2">
                    <p>Sterilisasi : <span class="badge bg-success">sudah</span></p>
                    <p>Usia (tahun) : <strong>4</strong></p>
                    <p>Berat (kg) : <strong>3</strong></p>
                </div>
                <div class="col-lg-4">
                    <p>Tanggal : <strong>12/04/2023</strong></p>
                    <p>Waktu : <strong>15.00 WITA</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card py-3 mt-2 shadow border-0">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="medical-record-add.html" class="btn btn-primary btn-sm mb-4">Tambah</a>
                    <p><strong>Rekam Medis :</strong></p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Dokter</th>
                                <th scope="col">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20 Apr 2023</td>
                                <td>drh. Kama</td>
                                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. At, tenetur provident? Recusandae quis explicabo voluptatibus cupiditate voluptatum. Nobis libero recusandae hic eum, voluptate consectetur, similique eligendi nostrum quidem laboriosam repudiandae voluptatum nam nemo amet. Aperiam perferendis eum voluptas fugit voluptatum.</td>
                            </tr>
                            <tr>
                                <td>26 Jun 2023</td>
                                <td>drh. Kama</td>
                                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. At, tenetur provident? Recusandae quis explicabo voluptatibus cupiditate voluptatum. Nobis libero recusandae hic eum, voluptate consectetur, similique eligendi nostrum quidem laboriosam repudiandae voluptatum nam nemo amet. Aperiam perferendis eum voluptas fugit voluptatum.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="card py-3 mt-2 shadow border-0">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Catatan Dokter :</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia impedit ut error adipisci, molestiae consequuntur aliquam voluptatem quos laudantium veniam ratione nemo debitis nisi distinctio et similique soluta. Minus corrupti voluptatibus non nam quod? Repellendus illum pariatur tenetur incidunt temporibus.</p>
                                    <p class="mt-5">Resep Obat :</p>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis cumque libero deleniti numquam, ut fugiat dicta labore ex quasi commodi?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
<!-- end Card -->
<a class="btn btn-primary btn-sm mt-3" href="/doctor/patient">Tutup</a>
@endsection