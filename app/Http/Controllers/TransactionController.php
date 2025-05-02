<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transaction;

    public function __construct(TransactionService $service)
    {
        $this->transaction = $service;
    }

    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transaction.create', compact('products'));
    }

    public function store(TransactionRequest $request)
    {
        $data = $request->validated();
        $this->transaction->create($data);

        return to_route('transaction.index')->with('success', 'transaction created');
    }

    public function edit($id)
    {
        $products = Product::all();
        $transaction =  $this->transaction->show($id);
        return view('transaction.edit', compact('transaction', 'products'));
    }

    public function update(TransactionRequest $request, $id)
    {
        $data = $request->validated();
        $this->transaction->update($data, $id);
        return to_route('transaction.index')->with('success', 'transaction updated');
    }

    public function destroy($id)
    {
        $this->transaction->delete($id);
        return back()->with('success', 'transaction deleted');
    }
}
