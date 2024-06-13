<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPasswordFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserPasswordController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPasswordFormRequest $request)
    {
        $request->user()->fill($request->validated());

        $request->user()->save();

        Auth::logout();

        $request->session()->invalidate();

        return Redirect::route('auth.create');
    }
}
