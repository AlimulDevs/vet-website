<?php

namespace App\Http\Controllers\WEB\user;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Facility;
use App\Models\Patient;
use App\Models\Pet;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function profileIndex()
    {
        $data_patient = Patient::where("id", session()->get("patient_id"))->first();

        return view("user.profile.index", compact("data_patient"));
    }
    public function historyIndex()
    {
        $data_consultation = Consultation::where("patient_id", session()->get("patient_id"))
            ->with("patient")
            ->with("doctor")
            ->with("pet")
            ->get();

        $data_reservation = Reservation::where("patient_id", session()->get("patient_id"))
            ->with("patient")
            ->with("pet")
            ->get();

        return view("user.history.index", compact("data_consultation", "data_reservation"));
    }

    public function historyDetailIndex()
    {
        $data_consultation = Consultation::where("patient_id", session()->get("patient_id"))
            ->with("patient")
            ->with("doctor")
            ->with("pet")
            ->get();



        return view("user.history.detail", compact("data_consultation"));
    }
    public function petIndex()
    {
        $data_pet = Pet::where("patient_id", session()->get("patient_id"))->get();
        return view("user.pet.index", compact("data_pet"));
    }

    public function index()
    {
        $data_article = Article::take(6)->get();
        return view("index", compact("data_article"));
    }
    public function aboutIndex()
    {
        $data_facility = Facility::get();
        $data_about = About::get();
        return view("user.about.index", compact("data_about", "data_facility"));
    }
    public function consultationIndex()
    {
        $data_doctor = Doctor::get();

        $data_pet = Pet::where("patient_id", session()->get("patient_id"))->first();
        $data_patient = Patient::where("id", session()->get("patient_id"))->first();
        return view("user.consultation.index", compact("data_doctor", "data_pet", "data_patient"));
    }

    public function consultationDetailIndex($id)
    {
        $data_doctor = Doctor::where("id", $id)->get();
        return view("user.consultation.detail", compact("data_doctor"));
    }
    public function consultationFormIndex($id)
    {
        $data_pet = Pet::where("patient_id", session()->get("patient_id"))->get();
        $data_doctor = Doctor::where("id", $id)->get();
        return view("user.consultation.form", compact("data_doctor", "data_pet"));
    }

    public function reservationIndex()
    {
        $data_pet = Pet::where("patient_id", session()->get("patient_id"))->get();
        $data_service = Service::get();
        return view("user.reservation.index", compact("data_pet", "data_service"));
    }

    public function articleIndex()
    {
        $data_category_article = CategoryArticle::get();
        $data_article = Article::with("category_article")->get();
        return view("user.article.index", compact("data_category_article", "data_article"));
    }
    public function articleDetailIndex($id)
    {

        $data_article = Article::with("category_article")->where("id", $id)->get();
        return view("user.article.detail", compact("data_article"));
    }
}
