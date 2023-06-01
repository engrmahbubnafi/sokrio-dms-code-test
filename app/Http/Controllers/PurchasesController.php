<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $purchases = Purchase::get()->toArray();

        return Inertia::render('Purchases/Index', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $products = Product::pluck('name', 'id')->toArray();

        return Inertia::render('Purchases/Create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        dd($request);
        $validated = $request->validate([
            'product_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required'
        ]);

        DB::beginTransaction();
        try {
            Purchase::create($validated);

            return redirect()
                ->route('purchases.create')
                ->with('message', 'Purchase created successfully!');
        } catch (Throwable $throwable) {
            DB::rollBack();

            return response()->json([
                'message' => $throwable->getMessage(),
                'error' => true,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
