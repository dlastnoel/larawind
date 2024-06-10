<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthenticationFormRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

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

        $user = User::firstWhere('email', $request->validated('email'));

        if(!$user) {

            return Redirect::back()->withErrors(['email' => 'User not found.']);
        }

        if(!Hash::check($request->validated('password'), $user->password)) {
            
            return Redirect::back()->withErrors(['password' => 'Incorrect password.']);
        }

        if($user->status !== 'active') {

            return Redirect::back()->withErrors(['email' => 'User inactive.']);
        }

        Auth::loginUsingId($user->id);

        $request->session()->regenerate();

        return Redirect::intended(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return Redirect::route('auth.create');
    }
}
