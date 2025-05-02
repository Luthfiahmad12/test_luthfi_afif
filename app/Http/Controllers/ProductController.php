<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $path = $file->storeAs('product', $fileName);
        }
        $data =  $request->validated();
        $data['photo'] = $path;

        $this->service->create($data);

        return to_route('products.index')->with('success', 'product created');
    }

    public function edit($id)
    {
        $product = $this->service->show($id);
        return view('product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data =  $request->validated();
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $path = $file->storeAs('product', $fileName);
            $data['photo'] = $path;
        }

        $this->service->update($data, $id);
        return to_route('products.index')->with('success', 'product updated');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        return back()->with('success', 'product deleted');
    }
}
