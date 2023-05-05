<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App;

class HotelController extends Controller
{
    public function index()
    {
        App::setLocale('it');
        return view('hotels.index', [
            'hotels' => Hotel::orderBy('stars', 'desc')->get()
        ]);
    }

    public function delete(Request $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();
        $hotel->delete();
        return view('hotels.feedback.deleted');
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function edit(Request $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();
        return view('hotels.edit', [
            'hotel' => $hotel
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            'address' => ['required', 'max:255']
        ]);

        $hotel = new Hotel();
        $hotel->name = $request->input('name');
        $hotel->stars = $request->input('stars');
        $hotel->address = $request->input('address');
        $hotel->all_year = $request->has('all_year');
        $hotel->save();

        return view('hotels.feedback.created');

    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();

        $request->validate([
            'name' => ['required', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            'address' => ['required', 'max:255']
        ]);

        $hotel->name = $request->input('name');
        $hotel->stars = $request->input('stars');
        $hotel->address = $request->input('address');
        $hotel->all_year = $request->has('all_year');

        $hotel->save();

        return view('hotels.feedback.modified');

    }

}