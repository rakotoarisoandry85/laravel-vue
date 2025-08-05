<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Support\Facades\DB;


class ListProdController extends Controller
{
    //
   public  function getList()
    {
        $produits = Product::all();
       // $produits = DB::table('products')
       // ->select('id','name_product','description','detail_price','wholesale_price')->get();
       //dd($produits);
        return view('products.show',compact(
           ['produits']
        ));
    }
}
