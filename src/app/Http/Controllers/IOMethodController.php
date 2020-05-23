<?php

namespace App\Http\Controllers;

use App\IOMethod;
use App\Http\Resources\IOMethodCollection as IOMethodCollection;
use Illuminate\Http\Request;

class IOMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = new IOMethodCollection(IOMethod::orderBy('title', 'asc')->get());

        return response($collection, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IOMethod  $iOMethod
     * @return \Illuminate\Http\Response
     */
    public function show(IOMethod $iOMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IOMethod  $iOMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(IOMethod $iOMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IOMethod  $iOMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IOMethod $iOMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IOMethod  $iOMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(IOMethod $iOMethod)
    {
        //
    }
}
