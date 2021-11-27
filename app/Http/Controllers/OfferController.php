<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\File;
use App\Models\location;
use App\Models\User;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    
    public function index()
    {
        return view('admin.oferta.index');
    }

    public function create()
    {
        return view('admin.oferta.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show(Offer $offer)
    {
        //
    }

    public function edit(Offer $offer)
    {
        //
    }

    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
