<?php 

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function view;
class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        $adverts = Advert::where('users_id', Auth::id())->paginate(8);     
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
        $categories = Categorie::all();
        return view('myAdvertsCreate',[            
            'categories' => $categories,
            ]);
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'condition' => 'required',
            'price' => 'required|integer|min:0|max:10000000',
            'location' => 'required',           
            'image' =>'mimes:jpg,png,jpeg|max:5048'           
        ]);
        
        if($request->file('image')){
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'),$newImageName);
        }
        else{
            $newImageName = 'default.jpg';           
        }
        $userId = Auth::id();
        $advert = Advert::create([
        'title' => $request->input('title'),
        'condition' => $request->input('condition'),
        'price' => $request->input('price'),
        'location' => $request->input('location'), 
        'text' => $request->input('text'),
        'categorie_id' => $request->input('catagorie'),
        'users_id' => $userId,
        'image_path' => $newImageName
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
        $adverts = Advert::all()->where('id',$id);
        $categories = Categorie::all();        
        $users = User::all();
        
        return view('myAdvertsID_Show',[
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
        $advert = Advert::find($id);
        $categories = Categorie::all();
//        return view('myAdvertsEdit')->with('advert', $advert);
        
        return view('myAdvertsEdit')->with('advert', $advert)
                ->with('categories', $categories);
        
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
        $request->validate([
            'title' => 'required',
            'condition' => 'required',
            'price' => 'required|integer|min:0|max:10000000',
            'location' => 'required',                      
        ]);
        
        if($request->file('image')){
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'),$newImageName);
        }
        else{
            $newImageName = 'default.jpg';           
        }
        
        $userId = Auth::id();       
        $advert = Advert::where('id',$id)
            ->update([
                'title' => $request->input('title'),
                'condition' => $request->input('condition'),
                'price' => $request->input('price'),
                'location' => $request->input('location'), 
                'text' => $request->input('text'),
                'categorie_id' => $request->input('catagorie'),
                'users_id' => $userId,
                'image_path' => $newImageName
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
