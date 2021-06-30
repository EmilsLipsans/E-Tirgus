<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Categorie;
use App\Models\Favourite;
use App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::all();
        $categories = Categorie::all();
        $favourites = Favourite::all()->where('users_id', Auth::id());
       
        return view('dashboard',[
            'adverts' => $adverts,
            'favourites' => $favourites, 
            'categories' => $categories,
            'showPagination' => 1,
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
        //
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
        
        return view('dashboardShow',[
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
        if(Gate::allows('is-admin'))
        {
            $advert = Advert::find($id);
            $advert->delete();
            return redirect('/dashboard');
        }
        else
        {
            return redirect('dashboard')->withErrors('Access denied!');
        }        
    }
    public function filter(Request $request)
    {

        $favourites = Favourite::all()->where('users_id', Auth::id());
        $categories = Categorie::all();
        
        $query = Advert::all();      
        if ($request->location != null) {
            $query = $query->whereIn('location',$request->location);
        }

        if ($request->condition != null) {
            $query = $query->where('condition', $request->condition);
        }

        if ($request->category != null) {
            $query = $query->where('categorie_id', $request->category);
        }          
        return view('dashboard',[
            'adverts' => $query,
            'favourites' => $favourites,
            'categories' => $categories,
            'showPagination' => is_null(request('all')),
            ]);     
    }
}
