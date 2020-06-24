<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Api\Categories;

use Carbon\Exceptions\BadUnitException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        return $this->apiResponse(ResultType::Success, Categories::all(), 'Categories fetch', 200);



//        $offset = $request->offset ? $request->offset: 0;
//        $limit = $request->limit ? $request->limit : 10;
//        $list = Categories::query()->with('product');
//        if ($request->has('q')){
//            $list ->where('name','like','%' . $request->query('q') . '%');
//        }
//        if ($request->has('sortBy')){
//            $list->orderBy($request->query('sortBy'),$request->query('sort','DESC'));
//        }
//        $data = $list->offset($offset)->limit($limit)->get();
//        return response($data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Categories;
        $categories->name = $request->name;
        $categories->status = $request->status;
        $categories->save();
        return $this->apiResponse(ResultType::Success, $categories, "Categories Created", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Api\Categories $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::find($id);
        if ($categories) {
            return $this->apiResponse(ResultType::Success,$categories, 'Categories fecth', 200);
        } else {
            return $this->apiResponse(ResultType::Success, $categories,'Categories fecth', 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Categories $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cat_id)
    {
        $data = $request->all();
        $requested = Categories::where('id', $cat_id)->update($data);
        return $this->apiResponse(ResultType::Success, $request, 'update success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Api\Categories $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categories::where('id', $id)->delete();
        return $this->apiResponse(ResultType::Success, $data, 'Categories Delete', 200);

    }
    public function custom1(){
        return Categories::pluck('name','id');
    }
    public function report1(){
        return DB::table('product_categories as pc')
            ->selectRaw('c.name,COUNT(*) as total')
            ->join('categories as c','c.id','=','pc.categories_id')
             ->join('products as p','p.id','=','pc.products_id')
            ->groupBy('c.name')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

    }

}
