<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\User;

use App\Models\Restaurant;
use App\Models\User;
use App\Services\Restaurants\RestaurantManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        $isEdit = false;
        $restaurant = new Restaurant();
        return view('admin.restaurants.form', compact('restaurant', 'isEdit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = RestaurantManager::validation($request->all());
        $restaurant = new Restaurant;
        $restaurant->fill($data);
        $restaurant->user_id = auth()->user()->id;

        $restaurant->save();

        return redirect()->route('restaurants.index')->with('message_content', 'Appartamento creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, User $user)
    {
        $user = Auth::user();
        if ($user->id === $restaurant->user_id) {
            $isEdit = true;
            // dd($restaurant);
            return view('admin.restaurants.form', compact('restaurant', 'isEdit'));
        }
        abort(403, "accesso non autorizzato");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $data = RestaurantManager::validation($request->all());
        $id = $restaurant->id;
        $restaurant->update($data);
        // dd($restaurant);
        // dd($data);

        return redirect()->route('restaurants.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurants.index')->with('message_content', 'Appartamento eliminato con successo') //with per passare variabile di sessione
            ->with('message_type', 'danger');
    }
}