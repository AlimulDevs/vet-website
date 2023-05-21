<?php

namespace App\Http\Controllers\WEB\user;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function add(Request $request)
    {
        $today_date = Carbon::now()->format('Y-m-d');

        $carbonDate = Carbon::createFromFormat("D, d M Y (H:i)", $request->date_time);

        $date    = date('Y-m-d', strtotime($carbonDate));
        $time = date('H:i:s', strtotime($carbonDate));
        $hour = date('H', strtotime($carbonDate));
        $minute = date('i', strtotime($carbonDate));



        if ($date == $today_date) {
            return redirect('/user/reservation-index')->with("failed_create", "Gagal Menambahkan Data");
        }

        if ($hour < 8 || $hour > 20) {
            return redirect('/user/reservation-index')->with("failed_create", "Gagal Menambahkan Data");
        }


        $get_reservation = Reservation::where("date", $date)->first();

        if ($get_reservation != null) {

            if ($get_reservation->hour == $hour) {
                return redirect('/user/reservation-index')->with("failed_create", "Gagal Menambahkan Data");
            }

            if ($get_reservation->hour + 1 == $hour) {
                if ($get_reservation->minute > $minute) {
                    return redirect('/user/reservation-index')->with("failed_create", "Gagal Menambahkan Data");
                } else {
                    $data_reservation =  Reservation::create([
                        "patient_id" => session()->get("patient_id"),
                        "service" => $request->service,
                        "pet_id" => $request->pet_id,
                        "date" => $date,
                        "hour" => $hour,
                        "minute" => $minute,
                    ]);
                    return redirect('/user/reservation-index')->with("success_create", $data_reservation->id);
                }
            }

            $data_reservation =   Reservation::create([
                "patient_id" => session()->get("patient_id"),
                "service" => $request->service,
                "pet_id" => $request->pet_id,
                "date" => $date,
                "hour" => $hour,
                "minute" => $minute,
                "pickup" => $request->pickup,
            ]);
            return redirect('/user/reservation-index')->with("success_create", $data_reservation->id);
        }


        $data_reservation =  Reservation::create([
            "patient_id" => session()->get("patient_id"),
            "service" => $request->service,
            "pet_id" => $request->pet_id,
            "date" => $date,
            "hour" => $hour,
            "minute" => $minute,
            "pickup" => $request->pickup,
        ]);




        return redirect('/user/reservation-index')->with("success_create", $data_reservation->id);
    }

    public function doneReservation(Request $request)
    {
        Reservation::where("id", $request->id)->update([
            "complaint" => $request->complaint,
            "recipe" => $request->recipe,
            "doctor_note" => $request->doctor_note,
        ]);

        $path_url = "/doctor/reservation/detail-index/" . $request->id;

        return redirect($path_url)->with("success_edit", "Success Update Data");
    }


    public function recordAdd(Request $request)
    {
        $data_record_medical = MedicalRecord::create([
            "doctor_id" => $request->doctor_id,
            "date" => $request->date,
            "notes" => $request->notes,
            "reservation_id" => $request->reservation_id,
        ]);

        $redirect_url = "/admin/patient/detail-index/" . $request->reservation_id;
        return redirect($redirect_url)->with("success_create", "Success Create Data");
    }



    public function delete($id)
    {
        Reservation::where("id", $id)->delete();
        return redirect('/admin/reservation-index')->with("success_delete", "Berhasil Menghapus Data");
    }
}
