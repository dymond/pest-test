<?php

namespace App\Http\Controllers;

use App\Models\Pivot\StuffUser;
use App\Models\Stuff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StuffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'sku' => 'required',
            'status' => ['required', Rule::in(array_keys(StuffUser::$statuses))],
        ]);
        $stuff = Stuff::create($request->only('title', 'sku'));
        $request->user()->stuffs()->attach($stuff, [
            'status' => $request->status
        ]);
        return redirect('/');
    }
}
