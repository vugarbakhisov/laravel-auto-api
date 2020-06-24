<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Api\Products;
use App\Models\Api\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $offset = $request->offset ? $request->offset: 0;
        $limit = $request->limit ? $request->limit : 10;
        $list = User::query();
        if ($request->has('q')){
            $list ->where('name','like','%' . $request->query('q') . '%');
        }
        if ($request->has('sortBy')){
            $list->orderBy($request->query('sortBy'),$request->query('sort','DESC'));
        }
        $data = $list->offset($offset)->limit($limit)->get();
        $data->each->setAppends(['full_name']);

        return response($data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;

        $data->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function data($id)
    {
      try{
          $user = User::findOrFail($id);
          return response($user,200);
      }
      catch (ModelNotFoundException $exception){
          return $this->apiResponse(ResultType::Success,null,'User Not Found',404);
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $requested = User::where('id',$id)->update($data);
        return response([
            'data' => $data,
            'message' =>"Ugurla Redaktə edildi"
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
        $delete = User::where('id',$id)->delete();
        return response([
            'data' => $delete,
            'message' =>'Məhsul Silindi'
        ]);
    }
    public function custom12(){
////        $user2 = User::find(55);
////        return new UserResource($user2);
//        $user = User::all();
////        return new UserCollection($user)
////        return UserResource::collection($user);
//        return UserResource::collection($user)->additional([
//            'meta' =>[
//                'total_users' => $user->count(),
//                'deneme' => 'Tets'
//            ]
//        ]);


        $user2 = User::all();
        return UserResource::collection($user2)->additional([
            'meta' => [
                'total_users' => $user2->count(),
                'custom' => 'value'
            ]
        ]);
    }
}
