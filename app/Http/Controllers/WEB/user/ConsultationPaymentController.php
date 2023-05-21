<?php

namespace App\Http\Controllers\Web\user;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConsultationPaymentController extends Controller
{
    public function add(Request $request)
    {
        $today_date = Carbon::now()->format('Y-m-d');
        $today_hour = Carbon::now()->format('H:i');

        $image = $request->file('proof');
        $proof = time() . $image->getClientOriginalName();
        if ($image->getClientMimeType() == 'application/pdf') {
            return redirect('/admin/article-index')->with("failed", "File harus berupa png or jpg");
        }
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'proof-image';

        // upload file
        $image->move($tujuan_upload, $proof);

        $proof = url("/" . $tujuan_upload . "/" . $proof);


        $consultation = Consultation::create([
            "patient_id" => session()->get("patient_id"),
            "pet_id" => $request->pet_id,
            "doctor_id" => $request->doctor_id,
            "complaint" => $request->complaint,
            "date" => $today_date,
            "hour" => $today_hour,
            "status" => "Pending"
        ]);

        $consultationPayment =  ConsultationPayment::create([
            "patient_id" => session()->get("patient_id"),
            "doctor_id" => $request->doctor_id,
            "pet_id" => $request->pet_id,
            "complaint" => $request->complaint,
            "proof" => $proof,
            "code" => $consultation->id
        ]);



        $route = "/user/consultation/form-index/" . $request->doctor_id;


        return redirect($route)->with("success_payment", $consultation->id);
    }


    public function accept($id)
    {
        $get_data = ConsultationPayment::where("id", $id)->first();


        Consultation::where("id", $get_data->code)->update([
            "status" => "Baru"
        ]);
        $this->deleteFile($get_data->proof);
        ConsultationPayment::where("id", $id)->delete();
        return redirect("/admin/consultation-payment-index")->with("success_accept", "Berhasil Accept Data");
    }
    public function reject($id)
    {
        $get_data = ConsultationPayment::where("id", $id)->first();


        Consultation::where("id", $get_data->code)->update([
            "status" => "Gagal"
        ]);
        $this->deleteFile($get_data->proof);
        ConsultationPayment::where("id", $id)->delete();
        return redirect("/admin/consultation-payment-index")->with("success_reject", "Berhasil Reject Data");
    }

    public function deleteFile($name_file)
    {
        $basePath = url('/');
        $delfile = str_replace("$basePath/", "", $name_file);
        return File::delete($delfile);
    }
}
