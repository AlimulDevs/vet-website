<?php

namespace App\Http\Controllers\WEB\admin\about;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function add(Request $request)
    {

        if ($request->file('photo_url')->getClientMimeType() == 'application/pdf') {
            return redirect('/admin/about-index')->with("failed", "File harus berupa png or jpg");
        }
        $photo_url = UploadFile::upload("about-image", $request->file('photo_url'));



        About::insert([
            "name" => $request->name,
            "role" => $request->role,
            "content" => $request->content,
            "photo_url" => $photo_url,
        ]);
        return redirect('/admin/about-index')->with("success_create", "Berhasil Menambahkan Data");
    }
    public function edit(Request $request)
    {
        if ($request->photo_url == null) {
            About::where("id", $request->id)->update([
                "name" => $request->name,
                "role" => $request->role,
                "content" => $request->content,
            ]);
            return redirect('/admin/about-index')->with("success_edit", "Berhasil Mengubah Data");
        }

        if ($request->file('photo_url')->getClientMimeType() == 'application/pdf') {
            return redirect('/admin/about-index')->with("failed", "File harus berupa png or jpg");
        }

        $data_about = About::where("id", $request->id)->first();

        DeleteFile::delete($data_about->photo_url);

        $image = $request->file('photo_url');

        $photo_url = UploadFile::upload("about-image", $image);

        About::where("id", $request->id)->update([
            "name" => $request->name,
            "role" => $request->role,
            "content" => $request->content,
            "photo_url" => $photo_url,
        ]);

        return redirect('/admin/about-index')->with("success_edit", "Berhasil Mengubah Data");
    }

    public function delete($id)
    {
        $data_about = About::where("id", $id)->first();
        DeleteFile::delete($data_about->photo_url);
        About::where("id", $id)->delete();
        return redirect('/admin/about-index')->with("success_delete", "Berhasil Menghapus Data");
    }
}
