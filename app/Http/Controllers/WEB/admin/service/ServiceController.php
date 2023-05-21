<?php

namespace App\Http\Controllers\WEB\admin\service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function add(Request $request)
    {
        Service::insert([
            "name" => $request->name
        ]);
        return redirect('/admin/service-index')->with("success_create", "Berhasil Menambahkan Data");
    }
    public function edit(Request $request)
    {
        Service::where("id", $request->id)->update([
            "name" => $request->name
        ]);
        return redirect('/admin/service-index')->with("success_edit", "Berhasil Mengubah Data");
    }

    public function delete($id)
    {
        Service::where("id", $id)->delete();
        return redirect('/admin/service-index')->with("success_edit", "Berhasil Menghapus Data");
    }
}
