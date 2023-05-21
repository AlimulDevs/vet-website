<?php

namespace App\Http\Controllers\WEB\admin\facility;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FacilityController extends Controller
{
    public function add(Request $request)
    {

        $image = $request->file('photo_url');
        $tujuan_upload = 'facility-image';

        if ($request->file('photo_url')->getClientMimeType() == 'application/pdf') {
            return redirect('/admin/facility-index')->with("failed", "File harus berupa png or jpg");
        }

        $photo_url = UploadFile::upload($tujuan_upload, $image);

        Facility::insert([
            "name" => $request->name,
            "photo_url" => $photo_url,
        ]);
        return redirect('/admin/facility-index')->with("success_create", "Berhasil Menambahkan Data");
    }
    public function edit(Request $request)
    {
        if ($request->photo_url == null) {
            Facility::where("id", $request->id)->update([
                "name" => $request->name,
            ]);
            return redirect('/admin/facility-index')->with("success_edit", "Berhasil Mengubah Data");
        }
        if ($request->file('photo_url')->getClientMimeType() == 'application/pdf') {
            return redirect('/admin/facility-index')->with("failed", "File harus berupa png or jpg");
        }

        $data_facility = Facility::where("id", $request->id)->first();

        DeleteFile::delete($data_facility->photo_url);

        $image = $request->file('photo_url');

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'facility-image';

        $photo_url = UploadFile::upload($tujuan_upload, $image);

        Facility::where("id", $request->id)->update([
            "name" => $request->name,
            "photo_url" => $photo_url,
        ]);

        return redirect('/admin/facility-index')->with("success_edit", "Berhasil Mengubah Data");
    }

    public function delete($id)
    {
        $data_facility = Facility::where("id", $id)->first();
        DeleteFile::delete($data_facility->photo_url);
        Facility::where("id", $id)->delete();
        return redirect('/admin/facility-index')->with("success_delete", "Berhasil Menghapus Data");
    }
}
