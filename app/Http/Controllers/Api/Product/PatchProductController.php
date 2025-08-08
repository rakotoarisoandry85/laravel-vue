<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatchProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,$id): JsonResponse
    {
        $validated = $request->validate([
            'name_product' => 'required|string',
            'description' => 'required|string',
            'detail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',

        ]);
        //dd($request);
        $product = Product::update($validated);
        return response()->json([
            'success' => true,
            'product' => $product,
        ]);
    }
}
