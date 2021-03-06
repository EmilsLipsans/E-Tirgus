<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Categorie;
use App\Models\Favourite;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::all();
        $favourites = Favourite::where('users_id', Auth::id())->paginate(8);     
        return view('favourites',[
            'favourites' => $favourites,  
            'adverts' => $adverts,
            ]);
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
        $userId = Auth::id();
        $favourite = Favourite::create([
        'users_id' => $userId, 
        'adverts_id' => $request->input('advertId'),
        ]);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adverts = Advert::all()->where('id',$id);
        $categories = Categorie::all();        
        $users = User::all();
        
        return view('favouritesShow',[
            'adverts' => $adverts, 
            'categories' => $categories,
            'users' => $users,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favourite = Favourite::where('adverts_id', $id);
        $favourite->delete();
        return redirect('dashboard');
    }
    public function destroy2($id)
    {
        $favourite = Favourite::where('adverts_id', $id);
        $favourite->delete();
        return redirect('favourites');
    }
}
