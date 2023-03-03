<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class GetProductController extends Controller
{
    public function __invoke(Request $request) {
        $limit = $request->query('limit');
        $product = Product::query()->paginate($limit);

        if($product->isEmpty()) {
            return $this->sendError(__('Data not found'));
        }

        return $this->sendSuccess([
            'data' => ProductResource::collection($product),
            'message' => __("Product List Successfully")
        ]);
    }
}
