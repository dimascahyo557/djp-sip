<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        // Mass assignment
        $result = Category::create($request->all());

        if ($result) {
            return redirect('admin/category')->with('success', 'Add data success!');
        } else {
            return redirect('admin/category')->with('failed', 'Add data failed!');
        }
    }

    // Route model binding
    public function show(Category $category)
    {
        // $category = Category::find($id);
        // $category = Category::findOrFail($id);
        // $category = Category::where('id', $id)->first();

        return view('admin.category.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:active,inactive',
        ], [
            'name.required' => 'Nama harus diisi.',
            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status tidak valid.',
        ]);

        // $category->name = $request->input('name');
        // $category->status = $request->input('status');
        // $result = $category->save();

        // Mass assignment
        $result = $category->update($request->all());

        if ($result) {
            return redirect('admin/category')->with('success', 'Update data success!');
        } else {
            return redirect('admin/category')->with('failed', 'Update data failed!');
        }
    }

    public function destroy(Category $category)
    {
        $products = $category->products;

        // hapus data product
        foreach ($products as $product) {
            // hapus gambar
            if (!empty($product->image) && Storage::exists('public/product/' . $product->image)) {
                Storage::delete('public/product/' . $product->image);
            }

            $product->delete();
        }

        $result = $category->delete();

        if ($result) {
            return redirect('admin/category')->with('success', 'Delete data success!');
        } else {
            return redirect('admin/category')->with('failed', 'Delete data failed!');
        }
    }

}
