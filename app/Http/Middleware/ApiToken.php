<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = $request->header('Authorization');
        if($auth){
            $token = str_replace('Bearer','',$auth);
            if(!$token){
                return response()->json([
                    'message' => 'No Token'
                ],401);
            }
            $user = User::where('api_token',$token)->first();
            if (!$user){
                return response()->json([
                    'message' => 'No  vrf-pfdfd Token'
                ],401);
            }
            auth()->setUser($user);
            return $next($request);
        }



    }
}
