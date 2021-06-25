<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class Advert extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'adverts'; 
    public function genre()
    {
        return $this->belongsTO(Categorie::class);       
    }
    public function usersPost() {
    $posts = DB::table('adverts')->where('user_id', auth()->id())->get();
    }
}
