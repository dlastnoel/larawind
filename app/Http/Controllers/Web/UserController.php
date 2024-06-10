<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Filters\UserFilter;
use App\Http\Requests\StoreUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = fn() => UserResource::collection(
            UserFilter::get($request)
        );

        $filters = $request->only('query', 'status', 'sort_by', 'direction', 'size');

        return Inertia::render('App/Users/Index', [
            'users' => $users,
            'filters' => $filters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('App/Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserFormRequest $request)
    {
        $user = User::create($request->except('role'));
        $user->assignRole($request->validated('role'));

        return Redirect::route('users.index');
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
    public function edit(User $user)
    {
        $user = fn() => new UserResource($user);

        return Inertia::render('App/Users/Edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserFormRequest $request, User $user)
    {
        $user->update($request->except('role'));

        if($user->role !== $request->validated('role')) {
            $user->removeRole($user->role);

            $user->assignRole($request->validated('role'));
        }

        return Redirect::route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
