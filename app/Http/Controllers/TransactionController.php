<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::whereRaw('quantity > min_quantity')->get();

        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $transaction = Transaction::create([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'price' => Product::find($validated['product_id'])->first()->price,
        ]);

        $product = Product::find($validated['product_id']);

        $product->quantity -= $validated['quantity'];

        $product->save();

        return redirect()->route('transactions.index')->with('sucess', 'Transação cadastrada');
    }
}
