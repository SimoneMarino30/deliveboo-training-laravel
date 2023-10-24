<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Services\Dishes\DishesManager;
use Illuminate\Http\Request;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($restaurant_id) // $restaurant è un parametro recuperato dall'URL e contiene l'ID del ristorante
    {
        $dishes = Dish::where('restaurant_id', $restaurant_id)->get();
        // dd($dishes);
        return view('admin.dishes.index', compact('dishes', 'restaurant_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Dish $dish, $restaurant_id)
    {
        $isEdit = false;

        $dish = new Dish();
        // dd($restaurant);
        // dd($dish);
        return view('admin.dishes.form', compact('dish', 'isEdit', 'restaurant_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurant_id)
    {
        $data = DishesManager::validationDishes($request->all());
        $dish = new Dish();

        $dish->fill($data);

        $dish->restaurant_id = $restaurant_id;
        $dish->save();

        return redirect()->route('dishes.index', ['restaurant' => $restaurant_id])->with('message_content', 'Piatto creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurant_id, Dish $dish)
    {
        $isEdit = true;

        // $dish_id = $dish->id;
        // dd($dish);
        return view('admin.dishes.form', compact('isEdit', 'restaurant_id', 'dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $restaurant_id, Dish $dish)
    {
        // ! CONTROLLARE PERCHè NON SALVA
        $data = DishesManager::validationDishes($request->all());

        if ($dish) $dish->update($data);
        else abort(403, "accesso non autorizzato");


        // Passo i parametri dell' url tramite array associativo
        return redirect()->route('dishes.index', ['restaurant' => $restaurant_id, 'dish' => $dish]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurant_id, Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index', ['restaurant' => $restaurant_id, 'dish' => $dish])->with('message_content', 'Piatto ' . $dish->name . ' eliminato con successo')->with('message_type', 'danger');
    }
}
