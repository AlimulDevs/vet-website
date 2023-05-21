<?php

namespace App\Http\Controllers\WEB\admin\doctor;

use App\Helpers\ChangeFormatNoHp;
use App\Helpers\DeleteFile;
use App\Helpers\Helper;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    public function add(Request $request)
    {
        $get_email_user = User::where("email", $request->email)->first();

        if ($get_email_user !== null) {
            return redirect('/admin/add-index')->with("failed_create", "Gagal Register, Email Sudah Ada");
        }



        User::insert([
            "role" => "doctor",
            "email" => $request->email,
            "password" => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        $data_user = User::get()->last();
        if ($request->photo_url == null) {
            Doctor::insert([
                "name" => $request->name,
                "user_id" => $data_user->id,
                "no_hp" => ChangeFormatNoHp::changeFormat($request->no_hp),
                "status" => false,
                "photo_url" => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png',
            ]);

            return redirect('/admin/doctor-index')->with("success_create", "Berhasil Melakukan Register");
        } else {
            $image = $request->file('photo_url');
            $tujuan_upload = 'doctor-image';
            if ($request->file('photo_url')->getClientMimeType() == 'application/pdf') {
                return redirect('/admin/doctor-index')->with("failed", "File harus berupa png or jpg");
            }
            // isi dengan nama folder tempat kemana file diupload
            $photo_url = UploadFile::upload($tujuan_upload, $image);



            Doctor::insert([
                "name" => $request->name,
                "user_id" => $data_user->id,
                "no_hp" => $request->no_hp,
                "status" => false,
                "photo_url" => $photo_url,
            ]);
            return redirect('/admin/doctor-index')->with("success_create", "Berhasil Melakukan Register");
        }
    }
    public function edit(Request $request)
    {



        if ($request->photo_url == null) {
            Doctor::where("id", $request->id)->update([
                "name" => $request->name,
                "no_hp" => $request->no_hp,
            ]);

            return redirect('/admin/doctor-index')->with("success_update", "Berhasil Melakukan Update Data");
        } else {
            $data_doctor = Doctor::where("id", $request->id)->first();
            $this->deleteFile($data_doctor->image_url);
            if ($request->file('photo_url')->getClientMimeType() == 'application/pdf') {
                return redirect('/admin/doctor-index')->with("failed", "File harus berupa png or jpg");
            }

            $image = $request->file('photo_url');
            $tujuan_upload = 'doctor-image';

            $photo_url = UploadFile::upload($tujuan_upload, $image);




            Doctor::where("id", $request->id)->update([
                "name" => $request->name,
                "no_hp" => $request->no_hp,
                "photo_url" => $photo_url,
            ]);
            return redirect('/admin/doctor-index')->with("success_edit", "Berhasil Melakukan Register");
        }
    }


    public function delete($id)
    {
        $data_doctor = Doctor::where("id", $id)->first();
        $this->deleteFile($data_doctor->image_url);
        Doctor::where("id", $id)->delete();
        return redirect('/admin/doctor-index')->with("success_delete", "Berhasil Menghapus Data");
    }





    public function editProfile(Request $request)
    {
        $get_doctor =  Doctor::where("id", session()->get("doctor_id"))->first();

        Doctor::where("id", session()->get("doctor_id"))->update([
            "name" => $request->name,
            "no_hp" => ChangeFormatNoHp::changeFormat($request->no_hp),
            "status" => $request->status
        ]);

        User::where("id", $get_doctor->user_id)->update([
            "email" => $request->email
        ]);
        $path = "/doctor/profile-index";

        return redirect($path)->with("success_edit", "Berhasil Menghapus Data");
    }


    public function editPhotoProfile(Request $request)
    {


        $data_doctor = Doctor::where("id", session()->get("doctor_id"))->first();

        DeleteFile::delete($data_doctor->photo_url);


        $image = $request->file('photo_url');
        $photo_url = time() . $image->getClientOriginalName();
        if ($image->getClientMimeType() == 'application/pdf') {
            return redirect('/doctor/profile-index')->with("failed", "File harus berupa png or jpg");
        }
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'doctor-profile';

        // upload file
        $image->move($tujuan_upload, $photo_url);

        $photo_url = url("/" . $tujuan_upload . "/" . $photo_url);
        $request->session()->put('photo_url', $photo_url);
        Doctor::where("id", session()->get("doctor_id"))->update([

            "photo_url" => $photo_url,
        ]);


        return redirect('/doctor/profile-index')->with("success_edit", "Berhasil Update Data");
    }

    public function deleteFile($name_file)
    {
        $basePath = url('/');
        $delfile = str_replace("$basePath/", "", $name_file);
        return File::delete($delfile);
    }
}
