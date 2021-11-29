<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        // Eloquent
        $data = Category::all();
        return view('admin.category.index', ['categories' => $data]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:active,inactive',
        ], [
            'name.required' => 'Nama harus diisi.',
            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status tidak valid.',
        ]);
        // validasi
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'status' => 'required|in:active,inactive',
        // ], [
        //     'name.required' => 'Nama harus diisi.',
        //     'status.required' => 'Status harus diisi.',
        //     'status.in' => 'Status tidak valid.',
        // ]);

        // // jika gagal
        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator->errors())
        //         ->withInput($request->all());
        // }

        // simpan data
        // $category = new Category();
        // $category->name = $request->input('name');
        // $category->status = $request->input('status');
        // $result = $category->save();
        $result = Category::create($request->all());

        if ($result) {
            return redirect('admin/category')->with('success', 'Add data success!');
        } else {
            return redirect('admin/category')->with('failed', 'Add data failed!');
        }
    }
}
