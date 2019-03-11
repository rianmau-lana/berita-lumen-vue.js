<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_category' => 'required|string',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $categories = Category::create($request->all());
        if ($categories) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil ditambahkan',
                'result'  => $categories
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
        $categories = Category::all();
        return [
            'status'  => 'success',
            // 'message' => 'data berhasil ditambahkan',
            'result'  => $categories
        ];
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'judul'       => 'required|string',
            'post'        => 'required|string',
            'id_category' => 'required|integer|max:2',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $data_categories = Category::find($id);
        if (empty($data_categories)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $categories = $data_categories->update($request->all());
        if ($categories) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil diubah',
                'result'  => $categories
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
        $data_categories = Category::find($id);
        if (empty($data_categories)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $categories = $data_categories->delete($id);
        if ($categories) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil dihapus',
                'result'  => $categories
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
        $categories = Category::find($id);

        if (empty($categories)) {
            return [
                'status'  => 'error',
                'message' => 'data gagal ditemukan',
                'result'  => null
            ];
        }
        
        return [
            'status'  => 'success',
            'result'  => $categories
        ];
    }
}
