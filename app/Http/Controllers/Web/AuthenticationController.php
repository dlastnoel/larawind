<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthenticationFormRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthenticationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Auth/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthenticationFormRequest $request)
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
