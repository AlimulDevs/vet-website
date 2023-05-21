<?php

namespace App\Http\Controllers\WEB\admin\category_article;

use App\Http\Controllers\Controller;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class CategoryArticleController extends Controller
{
    public function add(Request $request)
    {
        CategoryArticle::insert([
            "name" => $request->name
        ]);
        return redirect('/admin/category-article-index')->with("success_create", "Berhasil Menambahkan Data");
    }
    public function edit(Request $request)
    {
        CategoryArticle::where("id", $request->id)->update([
            "name" => $request->name
        ]);
        return redirect('/admin/category-article-index')->with("success_edit", "Berhasil Mengubah Data");
    }

    public function delete($id)
    {
        CategoryArticle::where("id", $id)->delete();
        return redirect('/admin/category-article-index')->with("success_delete", "Berhasil Menghapus Data");
    }
}
