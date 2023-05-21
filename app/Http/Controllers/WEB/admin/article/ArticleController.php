<?php

namespace App\Http\Controllers\WEB\admin\article;

use App\Helpers\DeleteFile;
use App\Helpers\Helper;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function add(Request $request)
    {
        if ($request->file('image_url')->getClientMimeType() == 'application/pdf') {
            return redirect('/admin/article-index')->with("failed_create", "Gagal Menambahkan Data");
        }
        $image_url =  UploadFile::upload("article-image", $request->file('image_url'));

        Article::insert([
            "category_article_id" => $request->category_article_id,
            "title" => $request->title,
            "author_name" => $request->author_name,
            "content" => $request->content,
            "image_url" => $image_url,
        ]);
        return redirect('/admin/article-index')->with("success_create", "Berhasil Menambahkan Data");
    }
    public function edit(Request $request)
    {
        if ($request->image_url == null) {
            Article::where("id", $request->id)->update([
                "category_article_id" => $request->category_article_id,
                "title" => $request->title,
                "author_name" => $request->author_name,
                "content" => $request->content,
            ]);
            return redirect('/admin/article-index')->with("success_edit", "Berhasil Mengubah Data");
        }

        $data_article = Article::where("id", $request->id)->first();
        if ($request->file('image_url')->getClientMimeType() == 'application/pdf') {
            return redirect('/admin/article-index')->with("failed", "File harus berupa png or jpg");
        }

        DeleteFile::delete($data_article->image_url);

        $image_url = UploadFile::upload("article-image", $request->file('image_url'));

        Article::where("id", $request->id)->update([
            "category_article_id" => $request->category_article_id,
            "title" => $request->title,
            "author_name" => $request->author_name,
            "content" => $request->content,
            "image_url" => $image_url,
        ]);

        return redirect('/admin/article-index')->with("success_edit", "Berhasil Mengubah Data");
    }

    public function delete($id)
    {
        $data_article = Article::where("id", $id)->first();
        DeleteFile::delete($data_article->image_url);
        Article::where("id", $id)->delete();
        return redirect('/admin/article-index')->with("success_delete", "Berhasil Menghapus Data");
    }
}
