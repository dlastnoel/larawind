<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfileFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class UserProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return Inertia::render('App/UserProfile/Edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfileFormRequest $request)
    {
        $request->user()->fill($request->except('avatar'));

        if($request->hasFile('avatar')) {

            $request->user()->addMedia($request->file('avatar'))->toMediaCollection('user_avatars');
        }

        $request->user()->save();

        return Redirect::back();
    }
}
