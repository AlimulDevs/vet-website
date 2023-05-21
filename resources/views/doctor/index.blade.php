@extends('template.index-doctor')

@section('content-doctor')
<!-- Summary -->
<div class="row g-3">
    <div class="col-12 col-sm-6 col-lg-4">
        <a href="#" class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between">
            <div>
                <i class="ri-dossier-line summary-icon bg-orange mb-2"></i>
                <div>Pasien</div>
            </div>
            <h4>435</h4>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4">
        <a href="#" class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between">
            <div>
                <i class="ri-message-3-line summary-icon bg-orange mb-2"></i>
                <div>Konsultasi</div>
            </div>
            <h4>135</h4>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4">
        <a href="#" class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between">
            <div>
                <i class="ri-calendar-line summary-icon bg-orange mb-2"></i>
                <div>Reservasi</div>
            </div>
            <h4>68</h4>
        </a>

    </div>
    <!-- end Table -->
    @endsection