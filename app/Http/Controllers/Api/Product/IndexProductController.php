<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexProductController extends Controller
{
    public function __invoke(Request $request): ProductCollection
    {
        return new ProductCollection(
            resource: Product::all(),
        );
    }
}
