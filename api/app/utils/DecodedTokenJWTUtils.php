<?php
namespace App\Utils;

use Tymon\JWTAuth\Facades\JWTAuth;

class DecodedTokenJWTUtils
{
    public static function userDecoded($request){
        return self::processDecoded($request);   
    }

    private static function processDecoded($request){
        try {
            $token = str_replace('Bearer ', '', $request->header('Authorization'));
           
            $decodedToken = JWTAuth::decode(JWTAuth::setToken($token)->getToken());
            
            return $decodedToken->toArray();
        
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json([
                'message'=> 'Token expired!'
            ],401); 
           
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json([
                'message'=> 'Invalid token!'
            ],401); 
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'message'=> 'Token is not provided!'
            ],400); 
        }
    }
}
