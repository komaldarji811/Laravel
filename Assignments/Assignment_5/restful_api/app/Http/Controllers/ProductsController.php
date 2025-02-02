<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductsResource;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::get();
        if($products->count() > 0){
            return ProductsResource::collection($products);
        }else{
            return response()->json(['message'=>'Data not found!!']);
        }

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>'Fields are required']);
        }
        $product = Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        if($product){
            return response()->json([
                'message'=>'Product inserted successfully..',
                'data'=>new ProductsResource($product)
            ]);
        }

    }

    public function show(Product $product){
        $products = Product::find($product->id);
        return response()->json($products);
    }

    public function update(Product $product,Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>'Fields are required']);
        }

        
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        $product = Product::find($product->id);
        if($product){
            return response()->json([
                'message'=>'Product updated successfully..',
                'data'=>new ProductsResource($product)
            ]);
        }
    }

    public function destroy(Product $product){
        $product->delete();

        return response()->json([
            'message'=>'product deleted successfully'
        ]);
    }
}
