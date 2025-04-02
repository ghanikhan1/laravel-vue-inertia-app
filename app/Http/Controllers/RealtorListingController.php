<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
//        dd(Auth::user()->listings);
        return inertia('Realtor/Index',
            ['listings' => $request->user()->listings]
        );
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()->with('success', 'Listing was deleted!');
    }
}
