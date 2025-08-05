<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductListController extends Controller
{
    //
   public function __invoke(Request $request): View
    {
        return view('products.index');
    }
}
