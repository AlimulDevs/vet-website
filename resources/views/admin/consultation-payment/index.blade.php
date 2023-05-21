@extends('template.index-admin')
@section("title", "Pembayaran Konsultasi")
@section('content-admin')


@if (session("success_accept"))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
    </svg>
    <div>
        Berhasil Menerima
    </div>
</div>
@endif
@if (session("success_reject"))
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        Berhasil Menolak
    </div>
</div>
@endif

<!-- Table -->
<div class="card border-0 shadow">
    <div class="card-body">
        <table class="table table-striped" id="dataTable">
            <a class="btn btn-primary btn-sm mb-4" href="/admin/category-article/add-index">Tambah</a>
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Nama Hewan</th>
                    <th scope="col">No. Whatsapp</th>
                    <th scope="col">Dokter Yang Menangani</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no =1
                @endphp
                @foreach ($data_consultation_payment as $dtcp)
                <tr class="text-center">
                    <td>{{$no++}}</td>
                    <td>{{$dtcp->patient->first_name}} {{$dtcp->patient->last_name}}</td>
                    <td>{{$dtcp->pet->name}}</td>
                    <td>{{$dtcp->patient->no_hp}}</td>
                    <td>{{$dtcp->doctor->name}}</td>
                    <td> <a href="{{$dtcp->proof}}"><img src="{{$dtcp->proof}}" alt="image_url" width="75px" height="75px"></a> </td>
                    <td>
                        <a class="btn btn-success btn-sm d-none" id="acceptButton" href="/admin/consultation-payment/accept/{{$dtcp->id}}"><i class="ri-edit-2-line"></i> Terima</a>
                        <a class="btn btn-danger btn-sm d-none" id="rejectButton" href="/admin/consultation-payment/reject/{{$dtcp->id}}"><i class="ri-delete-bin-line"></i> Tolak</a>
                        <button class="btn btn-success btn-sm " data-bs-toggle="modal" data-bs-target="#acceptModal"><i class="ri-edit-2-line"></i> Terima</button>
                        <button class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#rejectModal"><i class="ri-delete-bin-line"></i> Tolak</button>
                    </td>
                </tr>


                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menerima?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="handleAccept()">Terima</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menolak?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="handleReject()">Tolak</button>
            </div>
        </div>
    </div>
</div>

<script>
    function handleAccept() {
        document.getElementById("acceptButton").click();
    }

    function handleReject() {
        document.getElementById("rejectButton").click();
    }
</script>
<!-- end Table -->
@endsection