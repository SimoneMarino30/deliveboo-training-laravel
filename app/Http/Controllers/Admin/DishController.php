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
        // dd($restaurant_id);
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
        // ! RIVEDERE VALIDATION DECIMAL PRICE

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
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
