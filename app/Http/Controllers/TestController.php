<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return response()->json(['msg'=>'Returing json data instead of blade']);
    }
}
