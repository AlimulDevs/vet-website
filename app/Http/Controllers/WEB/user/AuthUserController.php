<?php

namespace App\Http\Controllers\WEB\user;

use App\Helpers\ChangeFormatNoHp;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\SendEmail;
use App\Helpers\Helper;
use App\Models\Doctor;
use Illuminate\Support\Facades\Mail as Mail;

// require_once app_path('helpers/generateNoHp.php');

class AuthUserController extends Controller
{
    public function register(Request $request)
    {

        if ($request->password1 !== $request->password2) {
            return redirect('/register-index')->with("failed_create", "Gagal Register, Password Tidak Sama");
        }

        $get_email_user = User::where("email", $request->email)->first();

        if ($get_email_user !== null) {
            return redirect('/register-index')->with("failed_create", "Gagal Register, Email Sudah Ada");
        }



        $data_user =  User::create([
            "role" => "patient",
            "email" => $request->email,
            "password" => Hash::make($request->password1),
            'remember_token' => Str::random(60),
        ]);


        $generate_no_hp = ChangeFormatNoHp::changeFormat($request->no_hp);
        $data_patient = Patient::insert([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "user_id" => $data_user->id,
            "no_hp" => $generate_no_hp,
            "photo_url" => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png',
        ]);

        return redirect('/login-index')->with("success_create", "Berhasil Melakukan Register");
    }


    public function login(Request $request)
    {
        $data_user = User::where("email", $request->email)->first();

        if ($data_user === null) {
            return redirect("/login-index")->with("failed_login", "Gagal Melakukan Login, Email Tidak Terdaftar");
        }

        if (Hash::check($request->password, $data_user->password)) {

            if ($data_user->role == "patient") {
                $data_patient = Patient::where("user_id", $data_user->id)->first();
                $name = $data_patient->first_name . " " . $data_patient->last_name;
                $request->session()->put('name', $data_patient->name);
                $request->session()->put('patient_id', $data_patient->id);
                $request->session()->put('role', $data_user->role);
                $request->session()->put('token', $data_user->remember_token);
                $request->session()->put('photo_url', $data_patient->photo_url);
                return redirect("/")->with("success", "Berhasil Melakukan Login");
            }

            if ($data_user->role == "doctor") {
                $data_doctor = Doctor::where("user_id", $data_user->id)->first();
                $request->session()->put('name', $data_doctor->name);
                $request->session()->put('doctor_id', $data_doctor->id);
                $request->session()->put('role', $data_user->role);
                $request->session()->put('photo_url', $data_doctor->photo_url);
                $request->session()->put('token', $data_user->remember_token);
                return redirect("/doctor")->with("success", "Berhasil Melakukan Login");
            }

            if ($data_user->role == "admin") {
                $request->session()->put('name', "Admin");
                $request->session()->put('role', $data_user->role);
                $request->session()->put('token', $data_user->remember_token);
                return redirect("/admin")->with("success", "Berhasil Melakukan Login");
            }
        } else {
            return redirect("/login-index")->with("failed_login", $data_user->email);
        }
    }

    public function forgotPassword(Request $request)
    {
        $get_user = User::where("email", $request->email)->first();
        if ($get_user == null) {
            return redirect("/forgot-password-indexs")->with("failed", "Email Belum Terdaftar");
        }
        $url = url("/change-password-index" . "/" . $get_user->remember_token);
        $body = "silahkan klik link berikut untuk mengganti password " . $url;
        $isi_email = [
            'title' => "Jose",
            'body' => $body
        ];

        Mail::to($request->email)->send(new SendEmail($isi_email));

        return redirect("/forgot-password-index")->with("success", "Silahkan Check Email Anda");
    }

    public function changePassword(Request $request)
    {

        if ($request->password1 !== $request->password2) {
            return redirect('/register-index')->with("failed_change", "Gagal Mengubah Password, Password Tidak Sama");
        }


        $data_user = User::where("id", $request->id)->update([
            "password" => Hash::make($request->password1),
            "remember_token" => Str::random(60),
        ]);

        return redirect("/login-index")->with("success_change", "Berhasil Mengubah Password");
    }

    public function logout(Request $request)
    {

        $request->session()->flush();
        return redirect("/")->with("success", "berhasil logout");
    }
}
