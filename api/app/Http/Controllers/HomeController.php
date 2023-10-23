<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utils\DecodedTokenJWTUtils;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('decode.jwt');
    }

    public function criar(Request $request){
        return response()->json([
            'message' => 'HOME METH9OD TO CREATE'
        ]);
    }

    public function listar(Request $request){
    
        return response()->json([
            'message' => 'HOMEEEE METHOD TO LIST'
        ]);
    }

    public function editar(Request $request){
    
        return response()->json([
            'message' => 'HOMEEEE METHOD TO EDIT'
        ]);
    }

    public function deletar(Request $request){
    
        return response()->json([
            'message' => 'HOMEEEE METHOD TO DELETE'
        ]);
    }
}
