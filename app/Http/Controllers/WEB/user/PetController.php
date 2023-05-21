<?php

namespace App\Http\Controllers\WEB\user;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function add(Request $request)
    {

        Pet::insert([
            "name" => $request->name,
            "age" => $request->age,
            "weight" => $request->weight,
            "species" => $request->species,
            "race" => $request->race,
            "is_sterile" => $request->is_sterile,
            "patient_id" => session()->get("patient_id"),
        ]);

        return redirect('/user/pet-index')->with("success_create", "Berhasil Menambah Data");
    }

    public function delete($id)
    {

        Pet::where("id", $id)->delete();

        return redirect('/user/pet-index')->with("success_delete", "Berhasil Menghapus Data");
    }
}
