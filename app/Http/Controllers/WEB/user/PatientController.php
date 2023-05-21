<?php

namespace App\Http\Controllers\WEB\user;

use App\Helpers\ChangeFormatNoHp;
use App\Helpers\DeleteFile;
use App\Helpers\Helper;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Pet;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function editProfil(Request $request)
    {
        Patient::where("id", session()->get("patient_id"))->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "no_hp" => ChangeFormatNoHp::changeFormat($request->no_hp),
            "address" => $request->address,
        ]);

        return redirect('/user/profile-index')->with("success_update", "Berhasil Update Data");
    }

    public function editPhotoProfile(Request $request)
    {


        $data_patient = Patient::where("id", session()->get("patient_id"))->first();

        DeleteFile::delete($data_patient->photo_url);


        $image = $request->file('photo_url');
        $tujuan_upload = 'patient-profile';

        if ($request->file('photo_url')->getClientMimeType() == 'application/pdf') {
            return redirect('/user/profile-index')->with("failed", "File harus berupa png or jpg");
        }
        // isi dengan nama folder tempat kemana file diupload

        $photo_url = UploadFile::upload($tujuan_upload, $image);


        $request->session()->put('photo_url', $photo_url);
        Patient::where("id", session()->get("patient_id"))->update([

            "photo_url" => $photo_url,
        ]);


        return redirect('/user/profile-index')->with("success_update", "Berhasil Update Data");
    }


    public function patientAdd(Request $request)
    {
        $data_user =  User::create([
            "role" => "patient",
            "email" => $request->email,
            "password" => Hash::make("pasien123"),
            'remember_token' => Str::random(60),
        ]);


        $generate_no_hp = ChangeFormatNoHp::changeFormat($request->no_hp);
        $data_patient = Patient::create([
            "first_name" => $request->first_name,
            "user_id" => $data_user->id,
            "no_hp" => $generate_no_hp,
            "photo_url" => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png',
        ]);

        $data_pet =  Pet::create([
            "name" => $request->name_pet,
            "age" => $request->age_pet,
            "weight" => $request->weight_pet,
            "species" => $request->species_pet,
            "race" => $request->race_pet,
            "is_sterile" => false,
            "patient_id" => $data_patient->id,
        ]);

        $date    = date('Y-m-d', strtotime($request->date_time));
        $time = date('H:i:s', strtotime($request->date_time));
        $hour = date('H', strtotime($request->date_time));
        $minute = date('i', strtotime($request->date_time));

        $data_reservation = Reservation::insert([
            "patient_id" => $data_patient->id,
            "service" => $request->service,
            "pet_id" => $data_pet->id,
            "date" => $date,
            "hour" => $hour,
            "minute" => $minute,
        ]);
        return redirect('/admin/patient/add-index')->with("success_create", "Berhasil Create Data");
    }


    public function deleteFile($name_file)
    {
        $basePath = url('/');
        $delfile = str_replace("$basePath/", "", $name_file);
        return File::delete($delfile);
    }
}
