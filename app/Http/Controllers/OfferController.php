<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\File;
use App\Models\location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    
    public function index()
    {   
        $user = User::find(Auth::user()->id);
        return view('admin.oferta.index', compact('user'));
    }

    public function create()
    {
        return view('admin.oferta.create');
    }

    public function store(Request $request)
    {

        $offer = new Offer;
        $file = new File;
        $location = new location;
        // Data Offer
        $offer->name = $request->name;
        $offer->description = $request->description;
        $offer->price = $request->price;
        $offer->save();

        // Data file
        if($request->file('file')){
            $file->file = $request->file('file')->store('file', 'public');
            $file->save();
        }
        
        // Data location
        $location->department = $request->department;
        $location->city = $request->city;
        $location->location = $request->location;
        $location->save();

        $offer->files()->sync($file);
        $offer->locations()->sync($location);
        $offer->users()->sync($request->user_id);

        $user = User::find(Auth::user()->id);
        return view('admin.oferta.index', compact('user'));
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
