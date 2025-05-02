<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $product  = Product::findOrFail($id);
        return $product->update($data);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }
}
