<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\User;

use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\User;
use App\Services\Restaurants\RestaurantManager;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


// use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $restaurants = Restaurant::all();

        // * RICERCA PER NOME
        $query = $request->input('query'); // query per id e name form
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->where('name', 'LIKE', '%' . $query . '%')->get();
        if ($restaurants->isEmpty()) {
            $message = 'Empty research';
            return view('admin.restaurants.index', compact('message', 'restaurants'));
        } else {
            return view('admin.restaurants.index', compact('restaurants'));
        }
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
        $typologies = Typology::orderBy('id')->get();
        return view('admin.restaurants.form', compact('restaurant', 'isEdit', 'typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // * cambio da 'on' a boolean 0/1
        // $visible = $request->input('visible');
        // $visible = ($visible == 'on') ? 1 : 0;

        $data = RestaurantManager::validationRestaurant($request->all());



        $restaurant = new Restaurant;

        $restaurant->fill($data);

        $restaurant->visible = $request->has('visible') ? 1 : 0;
        // dd($data);
        $restaurant->user_id = auth()->user()->id;

        $restaurant->save();

        if (Arr::exists($data, "typologies")) $restaurant->typologies()->attach($data["typologies"]);


        return redirect()->route('restaurants.index')->with('message_content', 'Ristorante creato con successo');
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

            $typologies = Typology::orderBy('id')->get();
            $restaurant_typologies = $restaurant->typologies->pluck('id')->toArray();

            return view('admin.restaurants.form', compact('restaurant', 'isEdit', 'typologies', 'restaurant_typologies'));
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
        $data = RestaurantManager::validationRestaurant($request->all());
        $id = $restaurant->id;
        $restaurant->visible = $request->has('visible') ? 1 : 0;
        $restaurant->update($data);


        if (Arr::exists($data, "typologies")) $restaurant->typologies()->sync($data["typologies"]);
        else $restaurant->typologies()->detach();

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
        //with per passare variabile di sessione
        return redirect()->route('restaurants.index')->with('message_content', 'Ristorante ' . $restaurant->name . ' eliminato con successo')->with('message_type', 'danger');
    }
}
