<?php

namespace App\Http\Controllers\WEB\doctor\consultation;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function doneConsultation(Request $request)
    {
        Consultation::where("id", $request->id)->update([
            "recipe" => $request->recipe,
            "doctor_note" => $request->doctor_note,
            "status" => "Selesai"
        ]);

        $path_url = "/doctor/consultation/detail-index/" . $request->id;

        return redirect($path_url)->with("success_edit", "Success Update Data");
    }

    public function delete($id)
    {
        Consultation::where("id", $id)->delete();

        if (session()->get("role") == "admin") {
            return redirect("/admin/consultation-index")->with("success_delete", "success delete data");
        } elseif (session()->get("role") == "doctor") {
            return redirect("/doctor/consultation-index")->with("success_delete", "success delete data");
        }
    }
}
