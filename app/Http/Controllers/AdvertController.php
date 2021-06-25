<?php 

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::where('users_id', Auth::id())->paginate(3);             
        return view('myAdvertsShow',[
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
        return view('myAdvertsCreate');
        
        
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
        $advert = Advert::create([
        'title' => $request->input('title'),
        'condition' => $request->input('condition'),
        'price' => $request->input('price'),
        'location' => $request->input('location'), 
        'text' => $request->input('text'),
        'categorie_id' => $request->input('catagorie'),
        'users_id' => $userId 
        ]);
        return redirect('/myAdverts/show');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advert::find($id);
        return view('myAdvertsEdit')->with('advert', $advert);
        
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
        $advert = Advert::where('id',$id)
            ->update([
                'title' => $request->input('title'),
                'condition' => $request->input('condition'),
                'price' => $request->input('price'),
                'location' => $request->input('location'), 
                'text' => $request->input('text'),
                'categorie_id' => $request->input('catagorie'),
                'users_id' => 1 
        ]);
        return redirect('/myAdverts/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert = Advert::find($id);
        $advert->delete();
        return redirect('/myAdverts/show');
    }
}
