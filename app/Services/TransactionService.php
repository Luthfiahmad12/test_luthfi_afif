<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Transaction;

class TransactionService
{
    public function create(array $data)
    {
        $price = Product::find($data['product_id'])?->price;
        $data['total'] = $price * $data['qty'];
        return Transaction::create($data);
    }

    public function show($id)
    {
        return Transaction::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $price = Product::find($data['product_id'])?->price;
        $data['total'] = $price * $data['qty'];

        $transaction = Transaction::find($id);
        return $transaction->update($data);
    }

    public function delete($id)
    {
        return Transaction::find($id)->delete();
    }
}
