<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetController extends Controller
{
    //
    function index (){
        $names =["Jonathan", "vivian"];

        $services = \App\Service::all();
        
        return view('get', compact('services'));
    }

    function add () {
        $data = request()->validate([
            'name' => ['required']
        ]);

        \App\Service::create($data);

        return redirect()->back();
    }
}
