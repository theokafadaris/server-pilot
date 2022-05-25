<?php

namespace App\Http\Controllers;

use App\Models\CloudProvider;
use Illuminate\Http\Request;

class CloudProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cloud_providers.index');
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
     * @param  \App\Models\CloudProvider  $cloud_provider
     * @return \Illuminate\Http\Response
     */
    public function show(CloudProvider $cloud_provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CloudProvider  $cloud_provider
     * @return \Illuminate\Http\Response
     */
    public function edit(CloudProvider $cloud_provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CloudProvider  $cloud_provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CloudProvider $cloud_provider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CloudProvider  $cloud_provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(CloudProvider $cloud_provider)
    {
        //
    }
}
