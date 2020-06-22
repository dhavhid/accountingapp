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
        $now = Carbon::now();
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
        $transaction->created_at = $now;
        $transaction->updated_at = $now;

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

        $transaction = Transaction::findOrFail($id);
        $now = Carbon::now();
        try {
            if (!is_null($request->input('transDate'))) {
                $transaction->transdate = Carbon::parse($request->input('transDate'), 'UTC')->toDateTimeString();
            }
        } catch (\Exception $e) {
            return Response(['error' => $this->getMessage(400)], 400);
        }

        $transaction->amount = (!is_null($request->input('amount')))? floatval($request->input('amount')) : $transaction->amount;
        $transaction->description = (!is_null($request->input('description')))? $request->input('description') : $transaction->description;
        $transaction->iomethod_id = (!is_null($request->input('iomethodId')))? $request->input('iomethodId') : $transaction->iomethod_id;
        $transaction->category_id = (!is_null($request->input('categoryId')))? $request->input('categoryId') : $transaction->category_id;

        // verify iomethod and category
        $countIOMethod = DB::table('iomethods')->where('id', $transaction->iomethod_id)->count();
        $countCategory = DB::table('categories')->where('id', $transaction->category_id)->count();
        if ($countCategory === 0 || $countIOMethod === 0) {
            return Response(['error' => $this->getMessage(400)], 400);
        }

        $transaction->updated_at = $now;
        $transaction->save();

        try {
            $transaction->save();
            return (new TransactionResource($transaction))
                ->response()
                ->setStatusCode(202);
        } catch (\Exception $e) {
            return response(['error' => $this->getMessage(400)], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        try {
            $transaction->delete();
            return response('', 202);
        } catch (\Exception $e) {}

        return response(['error' => $this->getMessage(400)], 400);
    }
}
