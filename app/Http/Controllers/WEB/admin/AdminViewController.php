<?php

namespace App\Http\Controllers\WEB\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\Consultation;
use App\Models\ConsultationPayment;
use App\Models\Doctor;
use App\Models\Facility;
use App\Models\Patient;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    //
    public function index()
    {
        $data_patient = Reservation::where("recipe", "!=", null)->count();
        $data_reservation = Reservation::where("recipe", null)->count();
        $data_consultation = Consultation::where("status", "!=", "Pending")->where("status", "!=", "Gagal")->count();

        return view("admin.index", compact("data_patient", "data_reservation", "data_consultation"));
    }
    //

    //
    public function consultationIndex()
    {
        $data_consultation = Consultation::with("pet")->with("doctor")->with("patient")->get();
        return view("admin.consultation.index", compact("data_consultation"));
    }
    public function consultationDetailIndex($id)
    {
        $data_consultation = Consultation::with("pet")->with("doctor")->with("patient")->where("id", $id)->get();
        return view("admin.consultation.detail", compact("data_consultation"));
    }
    //

    //
    public function reservationIndex()
    {
        $data_reservation = Reservation::with("patient")->with("pet")->where("recipe", null)->get();
        return view("admin.reservation.index", compact("data_reservation"));
    }
    public function reservationDetailIndex($id)
    {
        $data_reservation = Reservation::where("id", $id)->with("patient")->with("pet")->get();
        return view("admin.reservation.detail", compact("data_reservation"));
    }
    //

    //
    public function doctorIndex()
    {
        $data_doctor = Doctor::get();


        return view("admin.doctor.index", compact("data_doctor"));
    }
    public function doctorAddIndex()
    {
        return view("admin.doctor.add");
    }
    public function doctorEditIndex($id)
    {
        $data_doctor = Doctor::where("id", $id)->get();
        return view("admin.doctor.edit", compact("data_doctor"));
    }
    //

    //
    public function patientIndex()
    {
        $data_reservation = Reservation::where("recipe", "!=", null)->with("patient")->with("pet")->get();
        return view("admin.patient.index", compact("data_reservation"));
    }
    public function patientAddIndex()
    {
        $data_service = Service::all();
        return view("admin.patient.add", compact("data_service"));
    }
    public function patientDetailIndex($id)
    {
        $data_reservation = Reservation::where("recipe", "!=", null)->with("patient")->with("pet")->with("medical_record")->where("id", $id)->get();
        return view("admin.patient.detail", compact("data_reservation"));
    }
    public function medicalRecordIndex($id)
    {
        $data_doctor = Doctor::all();
        $data_reservation = Reservation::where("recipe", "!=", null)->with("patient")->with("pet")->with("medical_record")->where("id", $id)->get();
        return view('admin.patient.add-record', compact("data_reservation", "data_doctor"));
    }
    //

    //
    public function articleIndex()
    {
        $data_article = Article::with('category_article')->get();


        return view("admin.article.index", compact("data_article"));
    }
    public function articleAddIndex()

    {
        $data_category_article = CategoryArticle::get();
        return view("admin.article.add", compact("data_category_article"));
    }
    public function articleEditIndex($id)
    {
        $data_article = Article::where("id", $id)->get();
        $data_category_article = CategoryArticle::get();
        return view("admin.article.edit", compact("data_article", "data_category_article"));
    }
    //

    //
    public function facilityIndex()
    {
        $data_facility = Facility::get();


        return view("admin.facility.index", compact("data_facility"));
    }
    public function facilityAddIndex()

    {

        return view("admin.facility.add");
    }
    public function facilityEditIndex($id)
    {
        $data_facility = Facility::where("id", $id)->get();

        return view("admin.facility.edit", compact("data_facility"));
    }
    //

    //
    public function categoryArticleIndex()
    {
        $data_category_article = CategoryArticle::get();
        return view("admin.category-article.index", compact("data_category_article"));
    }
    public function categoryArticleAddIndex()
    {
        return view("admin.category-article.add");
    }
    public function categoryArticleEditIndex($id)
    {
        $data_category_article = CategoryArticle::where("id", $id)->first();
        return view("admin.category-article.edit", compact("data_category_article"));
    }
    //

    //
    public function aboutIndex()
    {
        $data_about = About::get();
        return view("admin.about.index", compact("data_about"));
    }
    public function aboutAddIndex()
    {
        return view("admin.about.add");
    }
    public function aboutEditIndex($id)
    {
        $data_about = About::where("id", $id)->get();
        return view("admin.about.edit", compact("data_about"));
    }
    //
    //
    public function serviceIndex()
    {
        $data_service = Service::get();
        return view("admin.service.index", compact("data_service"));
    }
    public function serviceAddIndex()
    {
        return view("admin.service.add");
    }
    public function serviceEditIndex($id)
    {
        $data_service = Service::where("id", $id)->first();
        return view("admin.service.edit", compact("data_service"));
    }
    //

    //
    public function consultationPaymentIndex()
    {
        $data_consultation_payment = ConsultationPayment::with("patient")->with("pet")->with("doctor")->get();
        return view("admin.consultation-payment.index", compact("data_consultation_payment"));
    }
}
