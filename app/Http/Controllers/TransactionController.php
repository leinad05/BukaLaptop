<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('access-permission-transaction');
        $data = Transaction::all();
        return view('transaction.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('access-permission-transaction');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('access-permission-transaction');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('access-permission-transaction');
        $data = Transaction::find($id);
        return view('transaction.confirmation', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('access-permission-transaction');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('access-permission-transaction');
        //
        $transaction = Transaction::find($id);
        $transaction->status = $request->get('name');
        $transaction->save();
        return redirect()->route('products.index')->with('status','Data successfully changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $this->authorize('access-permission-transaction');
        //dd("masuk destroy", $transaction);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('status','Successfully deleted');
    }

    public function showAjax(Request $request){
        $this->authorize('access-permission-transaction');
        $id = ($request->get('id'));
        $data = Transaction::find($id);
        $products = $data->products;
        return response()->json(array(
            'msg'=>view('transaction.showmodal', compact('data'))->render()
        ),200);
    }

    public function submitcheckout(){
        // $this->authorize('checkmember');

        $cart = session()->get('cart');
        // $user = Auth::user();

        $t = new Transaction;
        // $t->customer_id = $user->id;
        $t->user_id = 1;
        $t->tanggal_transaksi = Carbon::now()->toDateTimeString();
        $t->tanggal_transaksi = date('Y-m-d');
        $t->save();

        $total_harga = $t->insertProduct($cart);
        $t->total = $total_harga;
        $t->save();

        session()->forget('cart');
        return redirect('home');
    }

    public function acceptTransaction(Transaction $transaction)
    {
        // $transaction = Transaction::find($id);
        $transaction->status = "Accepted";
        $transaction->save();
        return redirect()->route('transactions.index')->with('status','successfully acc');
    }
}
