<?php

namespace App\Http\Controllers;

use App\Models\DepartamentoJefe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartamentoJefeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('departamentoJefe.index');
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
     * @param  \App\Models\DepartamentoJefe  $departamentoJefe
     * @return \Illuminate\Http\Response
     */
    public function show(DepartamentoJefe $departamentoJefe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepartamentoJefe  $departamentoJefe
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartamentoJefe $departamentoJefe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepartamentoJefe  $departamentoJefe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartamentoJefe $departamentoJefe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepartamentoJefe  $departamentoJefe
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartamentoJefe $departamentoJefe)
    {
        //
    }
}
