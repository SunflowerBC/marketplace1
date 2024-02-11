<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Service\V1\ProductQuery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = new ProductQuery();
        $queryItem = $filter->transform($request); // [[column,operator,value]]
        $orderItem = $filter->transformOrder($request); // [column,type]

        $product = Product::query();

        if (count($queryItem) == 0 && count($orderItem) == 0) {
            return new ProductCollection($product->paginate());
        }
//        $products = Product::query();
//        $query = new ProductQuery();
//        $query->trasform($request);
//        $products = $products->where("price", "<", "50000");
//        $products = $products->where('title', '=', 'nam');

//        $products = $products->where([["price", "<", 50000],["price", ">", 2000]]);
        return new ProductCollection($product->where($queryItem)->orderBy(...$orderItem)->paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new  ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
