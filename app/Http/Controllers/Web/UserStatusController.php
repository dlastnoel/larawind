<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserStatusFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;

class UserStatusController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserStatusFormRequest $request, User $user)
    {
        if($user->status === 'terminated') {
            return Redirect::back()->withError('error', 'Invalid. User already terminated.');
        }

        $user->update($request->validated());

        return Redirect::back();
    }
}
