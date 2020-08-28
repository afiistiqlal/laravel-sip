<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.page.category.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // setting rules validasi data
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong',
        ];

        // validasi data
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // jika data tidak valid
            return Redirect::to('admin/category/create')
                ->withErrors($validator)
            ;
        }

        // jika data valid
        // simpan ke database
        $category = new \App\Category();
        $category->name = $request->name; //Input::get('name');
        $category->status = $request->status; //Input::get('status');
        $category->save();

        // set flash message
        Session::flash('message', 'Category successfully saved');

        // redirect ke halaman index category
        return Redirect::to('admin/category/');
        // Category::create($request->all());

        // return 'Berhasil';
    }

    public function index()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'datalagi' => 'sebuah data',
        ];

        return view('admin.page.category.index', $data);
    }

    public function show($id)
    {
        $category = Category::find($id);
        $data = [
            'category' => $category,
        ];

        return view('admin.page.category.show', $data);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $data = [
            'category' => $category,
        ];

        return view('admin.page.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong',
        ];

        // validasi data
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // jika data tidak valid
            return Redirect::to('admin/category/'.$id.'/edit')
                ->withErrors($validator)
            ;
        }
        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        Session::flash('message', 'Category Successfully updated');
        
        return Redirect::to('admin/category');
    }
    
    public function destroy($id)
    {
        $product = Product::where('category_id', '=', $id)->get();
        // dd($product);
        if (count($product) > 0){
            Session::flash('error', 'Cannot Delete Category, Some product with the category still exist');
            return redirect::to('admin/category')->with('idcat', $id);
        }

        $category = Category::find($id);
        $category->delete();
        Session::flash('message', 'Category Succesfully Deleted');

        return Redirect::to('admin/category');
    }

    public function destroy2($id)
    {
        $products = Product::where('category_id', '=', $id)->get();
        if(count($products)>0){
            foreach ($products as $product) {
                $product->delete();
            }
        }
        $category = Category::find($id);
        $category->delete();
        Session::flash('message', 'Category Deleted');
        return Redirect::to('admin/category');
    }
}
