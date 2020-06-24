<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductWithCastegoriesResource;
use App\Models\Api\Categories;
use App\Models\Api\Product;
use App\Models\Api\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *

     */
    public function index(Request $request)
    {

        $offset = $request->has('offset') ? $request->query('offset'): 0;
        $limit = $request->has('limit') ? $request->query('limit') : 10;
        $list = Product::query();
        if ($request->has('q')){
            $list ->where('name','like','%' . $request->query('q') . '%');
        }
        if ($request->has('sortBy')){
            $list->orderBy($request->query('sortBy'),$request->query('sort','DESC'));
        }
        $data = $list->offset($offset)->limit($limit)->get();
        return response($data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return response([
            'data' => $data,
            'message' => 'Ugurrlu əlavə edildi'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
       return Product::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $update = $request->all();
        Product::where('id',$productId)->update($update);
        return  response([
            'data' => $update,
            'messagge' => 'Update Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::where('id',$id)->delete();
        return response([
            'data' => $delete,
            'message' =>'Məhsul Silindi'
        ]);
    }
    public function custom1(){
        return Products::selectRaw('id as product_id,name as product_name')
            ->orderBy('id','ASC')->take(20)->get();
    }
    public function custom2(){
        $product = Product::orderBy('id','asc')->take(10)->get();
        $mapped = $product->map(function ($product){
            return [
                '_id' =>$product['id'],
                'product_name' => $product['name'],
                'product_price' =>$product['price']
            ];
        });
        return $mapped->all();
    }
    public function custom3(){

        $product = Products::paginate(10);
        return ProductResource::collection($product);

    }
    public function listWithCategories(){
      $product = Products::paginate(10);
      return ProductWithCastegoriesResource::collection($product);
    }
}
