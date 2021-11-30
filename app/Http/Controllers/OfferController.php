<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\File;
use App\Models\location;
use App\Models\Category;
use App\Models\line;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    
    public function index()
    {   
        $user = User::find(Auth::user()->id);
        return view('admin.oferta.index', compact('user'));
    }

    public function create()
    {
        $lines = line::all();
        return view('admin.oferta.create', compact('lines'));
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
        $offer->lines()->sync($request->line_id);

        $user = User::find(Auth::user()->id);
        return redirect('/oferta/index');
    }

    public function show($id)
    {
        $offerDescription = Offer::find($id);
        return view('admin.oferta.show-offer', compact('offerDescription'));
    }

    public function edit($id)
    {
        $offer = Offer::find($id);
        $lines = line::all();
        return view('admin.oferta.edit', compact('offer', 'lines'));
    }

    public function update(Request $request)
    {
        $offer = Offer::find($request->id);
        $location = location::find($request->location_id);
        $file = File::find($request->file_id);
        // Data Offer
        $offer->name = $request->name;
        $offer->description = $request->description;
        $offer->price = $request->price;
        $offer->save();

        $location->department = $request->department;
        $location->city = $request->city;
        $location->location = $request->location;
        $location->save();

        if($request->file('file')){
            $file->file = $request->file('file')->store('file', 'public');
            $file->save();
        }

        $offer->lines()->sync($request->line);
        return redirect('/oferta/index');
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
