<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Inertia\Inertia;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function index()
    {
//        dd(Auth::user());

        return Inertia(
            'Index/Index',
            [
                'message' => 'Hello from Laravel'
            ]
        );
    }

    public function show()
    {
        return Inertia('Index/Show');
    }
}

