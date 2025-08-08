<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name_product' => 'required|string',
            'description' => 'required|string',
            'detail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',

        ]);
        //dd($request);
        $product = Product::create($validated);
        return response()->json([
            'success' => true,
            'product' => $product,
        ]);
    }
}
