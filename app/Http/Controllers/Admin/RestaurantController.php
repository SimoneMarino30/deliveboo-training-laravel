<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\User;

use App\Models\Restaurant;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        // $user = Auth::user();
        // $restaurants = Restaurant::where('user_id', $user->id)->orderBy('updated_at', 'DESC')->paginate(5);
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
        // dd($restaurant);
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

        $data = $this->validation($request->all());
        $restaurant = new Restaurant;
        $restaurant->fill($data);
        $restaurant->user_id = auth()->user()->id;

        $restaurant->save();

        return redirect()->route('restaurants.index')->with('success', 'OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, $id)
    {
        // dd($restaurant);

        $restaurant = Restaurant::all();
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurants.show', compact('restaurant', 'id'));
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
            // $restaurant = Restaurant::findOrFail($id);
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
        $data = $this->validation($request->all());
        $id = $restaurant->id;
        $restaurant->update($data);
        // dd($restaurant);
        // dd($data);

        return redirect()->route('restaurants.show', $id);
        // return redirect()->route('admin.restaurants.index');
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
        return redirect()->route('restaurants.index')->with('message_content', 'Appartamento eliminato con successo')
            ->with('message_type', 'danger');
    }

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:100',
                'address' => 'required|string|max:100',
                'piva' => 'required|string|max:12',
                'photo' => 'nullable|string|max:255',
            ],
            [
                'name.required' => 'il nome è obbligatorio',
                'name.max' => 'il nome deve avere al massimo 100 catteri',
                'name.string' => 'il titolo deve essere una stringa',

                'address.required' => 'l\' indirizzo è obbligatorio',
                'address.max' => 'l\' album deve avere al massimo 255 catteri',
                'address.string' => 'l\' album deve essere una stringa',

                'piva.required' => 'la partita IVA è obbligatoria',
                'piva.max' => 'la partita IVA  deve avere al massimo 12 catteri',
                'piva.string' => 'la partita IVA deve essere una stringa numerica',

                'photo.string' => 'la foto deve essere una stringa',
                'photo.max' => 'la foto deve avere al massimo 255 catteri',

            ]
        )->validate();

        return $validator;
    }
}
