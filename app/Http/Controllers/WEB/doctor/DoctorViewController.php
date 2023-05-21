<?php

namespace App\Http\Controllers\WEB\doctor;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Reservation;
use Illuminate\Http\Request;
use LDAP\Result;

class DoctorViewController extends Controller
{

    public function index()
    {
        return view("doctor.index");
    }
    public function profileIndex()
    {
        $data_doctor = Doctor::where("id", session()->get("doctor_id"))->with("user")->get();

        return view("doctor.profile.index", compact("data_doctor"));
    }

    //
    public function consultationIndex()
    {
        $data_consultation = Consultation::with("pet")
            ->with("doctor")
            ->with("patient")
            ->where("doctor_id", session()->get("doctor_id"))
            ->where("status", "!=", "Pending")
            ->get();
        return view("doctor.consultation.index", compact("data_consultation"));
    }
    public function consultationDetailIndex($id)
    {
        $data_consultation = Consultation::with("pet")->with("doctor")->with("patient")->where("id", $id)->get();
        return view("doctor.consultation.detail", compact("data_consultation"));
    }
    //

    //
    public function reservationIndex()
    {
        $data_reservation = Reservation::with("patient")->with("pet")->where("recipe", null)->get();
        return view("doctor.reservation.index", compact("data_reservation"));
    }
    public function reservationDetailIndex($id)
    {
        $data_reservation = Reservation::where("id", $id)->with("patient")->with("pet")->get();
        return view("doctor.reservation.detail", compact("data_reservation"));
    }
    //

    //
    public function patientIndex()
    {

        $data_reservation = Reservation::where("recipe", "!=", null)->with("patient")->with("pet")->get();
        return view("doctor.patient.index", compact("data_reservation"));
    }
    public function patientAddIndex()
    {
        return view("doctor.patient.add");
    }
    public function patientDetailIndex()
    {
        return view("doctor.patient.detail");
    }
    //
}
