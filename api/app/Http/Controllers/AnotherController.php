<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnotherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function home(){
        return response()->json([
            'message' => 'HOMEEEE JUST AUTHORIZED'
        ]);
    }
}
