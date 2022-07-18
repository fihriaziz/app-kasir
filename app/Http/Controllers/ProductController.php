<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name'      => 'required',
            'price'     => 'required',
            'stock'     => 'required',
            'unit'      => 'required',
            'status'    => 'required'
        ]);

        Product::create([
            'name'      => $req->name,
            'price'     => $req->price,
            'stock'     => $req->stock,
            'unit'      => $req->unit,
            'status'    => $req->status
        ]);

        return to_route('products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'name'      => 'required',
            'price'     => 'required',
            'stock'     => 'required',
            'unit'      => 'required',
        ]);

        $product = Product::find($id);
        $product->name   = $req->name;
        $product->price  = $req->price;
        $product->stock  = $req->stock;
        $product->unit   = $req->unit;
        $product->status = $req->status;
        $product->save();

        return to_route('products');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return to_route('products');
    }



    public function getProductByName()
    {
        $nota = Product::pluck('name');
        return response($nota);
    }

    public function getProducts()
    {
        $product = Product::all();
        return response($product);
    }

}
