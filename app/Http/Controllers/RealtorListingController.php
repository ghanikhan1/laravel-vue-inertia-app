<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function index(Request $request)
    {
//        dd(Auth::user()->listings);
        return inertia('Realtor/Index',
            ['listings' => $request->user()->listings]
        );
    }
}
