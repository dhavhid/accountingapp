<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Resources\TransactionCollection as TransactionCollection;
use App\Http\Resources\Transaction as TransactionResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Transaction::searchPaginated($request);
        return new TransactionCollection($results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        try {
            $transDate = Carbon::parse($request->input('transDate'), 'UTC')->toDateTimeString();
        } catch (\Exception $e) {
            return Response(['error' => $this->getMessage(400)], 400);
        }

        $amount = floatval($request->input('amount'));
        $description = $request->input('description');
        $iomethod_id = $request->input('iomethodId');
        $category_id = $request->input('categoryId');

        // verify iomethod and category
        $countIOMethod = DB::table('iomethods')->where('id', $iomethod_id)->count();
        $countCategory = DB::table('categories')->where('id', $category_id)->count();
        if ($countCategory === 0 || $countIOMethod === 0) {
            return Response(['error' => $this->getMessage(400)], 400);
        }

        $transaction = new \App\Transaction();
        $transaction->transdate = $transDate;
        $transaction->amount = $amount;
        $transaction->description = $description;
        $transaction->iomethod_id = $iomethod_id;
        $transaction->category_id = $category_id;
        $transaction->user_id = Auth::id();

        try {
            $transaction->save();
            return new TransactionResource($transaction);
        } catch (\Exception $e) {
            return response($this->getMessage(400), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return new TransactionResource($transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
