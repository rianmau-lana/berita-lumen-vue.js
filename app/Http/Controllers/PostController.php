<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'judul'       => 'required|string',
            'post'        => 'required|string',
            'id_category' => 'required|integer',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $posts = Post::create($request->all());
        if ($posts) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil ditambahkan',
                'result'  => $posts
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal ditambahkan',
                'result'  => null
            ];
        }
    }

    public function read(Request $request)
    {
        $posts = Post::with('category')->get();
        return [
            'status'  => 'success',
            'result'  => $posts
        ];
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'judul'       => 'required|string',
            'post'        => 'required|string',
            'id_category' => 'required|integer',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $data_posts = Post::find($id);
        if (empty($data_posts)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $posts = $data_posts->update($request->all());
        if ($posts) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil diubah',
                'result'  => $posts
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal diubah',
                'result'  => null
            ];
        }
    }

    public function delete(Request $request, $id)
    {
        $data_posts = Post::find($id);
        if (empty($data_posts)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $posts = $data_posts->delete($id);
        if ($posts) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil dihapus',
                'result'  => $posts
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal dihapus',
                'result'  => null
            ];
        }
    }

    public function detail ($id) {
        $posts = Post::find($id);

        if (empty($posts)) {
            return [
                'status'  => 'error',
                'message' => 'data gagal ditemukan',
                'result'  => null
            ];
        }
        
        return [
            'status'  => 'success',
            'result'  => $posts
        ];
    }
}
