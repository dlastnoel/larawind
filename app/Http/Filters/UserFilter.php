<?php

namespace App\Http\Filters;
use App\Contracts\Filters\Filterable;
use App\Models\User;
use App\Traits\Filters\Sortable;
use Illuminate\Http\Request;

class UserFilter implements Filterable {

    use Sortable;

    public static function get(Request $request) {

        $sortBy = ['firstname', 'lastname', 'status'];

        if($request->input('sort_by')) {

            switch ($request->input('sort_by')) {

                case 'Last Name':
                    $sortBy = ['lastname', 'firstname'];
                    break;

                case 'status': 
                    $sortBy = ['status'];
                    break;
            }
        }

        $users = User::with('roles')

            ->when($request->input('query'), function($query) use ($request) {

                $query->filter($request->input('query'));
            })

            ->when($request->input('status') && $request->input('status') !== 'all', function($query) use ($request) {

                $query->where('status', $request->input('status'));
            });

            foreach($sortBy as $sort) {

                $users = $users->orderBy($sort, self::direction($request));
            }

            $users = $users
                ->paginate(request('size', 10))
                ->withQueryString();

        return $users;
    }
}