<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Inertia\Inertia;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index()
    {
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

