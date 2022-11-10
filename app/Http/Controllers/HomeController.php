<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('home', [
            'stuffByStatus' => $request->user()?->stuffs->groupBy('pivot.status')
        ]);
    }
}
