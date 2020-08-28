<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Exports\ProductExport;
use App\Exports\ProductExportWithView;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::pluck('name', 'id');
        $cat_id = $request->query('cat_id');
        $keyword = $request->query('keyword');

        if (!empty($cat_id)) {
            $where[] = ["category_id", "=", $cat_id];
        }
        if (isset($keyword)) {
            $where[] = ["name", "LIKE", "%" . $keyword . "%"];
        }

        if (!empty($cat_id) || !empty($keyword)) {
            $products = Product::where($where)->paginate(2);
        } else {
            $products = Product::paginate(2);
        }
        // $products = Product::paginate(2);
        $data = [
            'products' => $products,
            'categories' => $categories,
            'cat_id' => $cat_id,
            'keyword' => $keyword
        ];
        return view('admin.page.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ambil dari db
        $categories = \App\Category::pluck('name', 'id');
        $data = [
            'categories' => $categories,
        ];

        return view('admin.page.product.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'sku' => 'required',
            'image' => 'required',
            'description' => 'required',
        ];
        $message = [
            "name.required" => "Nama Harus diisi",
        ];
        $validator_result = Validator::make($request->all(), $rules, $message);

        if ($validator_result->fails()) {
            return redirect('admin/product/create')->withErrors($validator_result)->withInput($request->all());
        } else {
            // jika berhasil
            $image = $request->file('image')->store('product', 'public');
            $product = new Product();
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->status = $request->status;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->image = $image;
            $product->category_id = $request->category_id;

            $product->save();

            Session::flash('message', 'Product Successfully Created');
            return redirect('admin/product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $data = [
            'product' => $product
        ];
        return view('admin.page.product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $product = Product::find($id);
        $data = [
            'categories' => $categories,
            'product' => $product,
        ];
        return view('admin.page.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'sku' => 'required',
            'description' => 'required',
        ];
        $message = [
            "name.required" => "Nama Harus diisi",
        ];
        $validator_result = Validator::make($request->all(), $rules, $message);

        if ($validator_result->fails()) {
            return redirect('admin/product/' . $id . '/edit')->withErrors($validator_result);
        } else {
            // jika berhasil

            $product = Product::find($id);
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->status = $request->status;
            $product->price = $request->price;
            $product->description = $request->description;
            // $product->image = $image;
            $product->category_id = $request->category_id;
            if (!empty($request->file('image'))) {
                $product->image = $request->file('image')->store('product', 'public');
            }

            $product->save();

            Session::flash('message', 'Product Successfully Updated');
            return redirect('admin/product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product');
    }

    public function export()
    {
        // return Excel::download(new ProductExport(), 'Daftar-Product.xlsx');
        return Excel::download(new ProductExportWithView(), 'Daftar-Product.xlsx');
    }
}
