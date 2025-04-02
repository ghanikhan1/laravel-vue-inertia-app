<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Termwind\Components\Li;


class ListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

// we can apply middleware here in counstructor as well but we applied in routes
//    public function __construct()
//    {
//        $this->middleware('auth')->except(['index', 'show']);
//    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom',
            'priceTo',
            'beds',
            'baths',
            'areaFrom',
            'areaTo',
        ]);

//        $query = Listing::orderByDesc('created_at')->when(
//            $filters['priceFrom'] ?? false,
//        fn($query, $value) => $query->where('price', '>=', $value)
//        )->when(
//            $filters['priceTo'] ?? false,
//            fn($query, $value) => $query->where('price', '<=', $value)
//        )->when(
//            $filters['beds'] ?? false,
//            fn($query, $value) => $query->where('beds', (int)$value < 5 ? '=' : '>=' , $value)
//        )->when(
//            $filters['baths'] ?? false,
//            fn($query, $value) => $query->where('baths', (int)$value < 5 ? '=' : '>=' ,$value)
//        )->when(
//            $filters['areaFrom'] ?? false,
//            fn($query, $value) => $query->where('area', '>=', $value)
//        )->when(
//            $filters['areaTo'] ?? false,
//            fn($query, $value) => $query->where('area', '<=', $value)
//        )->when(
//            $filters['areaTo'] ?? false,
//            fn($query, $value) => $query->where('area', '<=', $value)
//        );


        //Above is first and below is Second way to do this query


//        if ($filters['priceFrom'] ?? false) {
//            $query->where('price', '>=', $filters['priceFrom']);
//        }

//        if ($filters['priceTo'] ?? false) {
//            $query->where('price', '<=', $filters['priceTo']);
//        }

//        if ($filters['beds'] ?? false) {
//            $query->where('beds', $filters['beds']);
//        }

//        if ($filters['baths'] ?? false) {
//            $query->where('baths', $filters['baths']);
//        }

//        if ($filters['areaFrom'] ?? false) {
//            $query->where('area', '>=', $filters['areaFrom']);
//        }

//        if ($filters['areaTo'] ?? false) {
//            $query->where('area', '<=', $filters['areaTo']);
//        }

        return Inertia(
            'Listing/Index',
            [
                'filters' => $filters,

//                'listings' => $query->paginate(10)->withQueryString()

//                'listings' => Listing::mostRecent()->when(
//                    $filters['priceFrom'] ?? false,
//                    fn($query, $value) => $query->where('price', '>=', $value)
//                )->when(
//                    $filters['priceTo'] ?? false,
//                    fn($query, $value) => $query->where('price', '<=', $value)
//                )->when(
//                    $filters['beds'] ?? false,
//                    fn($query, $value) => $query->where('beds', (int)$value < 5 ? '=' : '>=' , $value)
//                )->when(
//                    $filters['baths'] ?? false,
//                    fn($query, $value) => $query->where('baths', (int)$value < 5 ? '=' : '>=' ,$value)
//                )->when(
//                    $filters['areaFrom'] ?? false,
//                    fn($query, $value) => $query->where('area', '>=', $value)
//                )->when(
//                    $filters['areaTo'] ?? false,
//                    fn($query, $value) => $query->where('area', '<=', $value)
//                )->when(
//                    $filters['areaTo'] ?? false,
//                    fn($query, $value) => $query->where('area', '<=', $value)
//                )->paginate(10)->withQueryString()


                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->paginate(10)
                    ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $this->authorize('create', Listing::class);
        return Inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:2000000',
            ]));

        return redirect()->route('listing.index')->with('success', 'Listing was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {


//        if ( Auth::user()->cannot('view', $listing)){
//            abort(403);
//        }

//        $this->authorize('view', $listing);

        return Inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return Inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:2000000',
            ]));

        return redirect()->route('listing.index')->with('success', 'Listing was updated');
    }
}
