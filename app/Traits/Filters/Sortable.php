<?php

namespace App\Traits\Filters;
use Illuminate\Http\Request;

trait Sortable {

    public static function direction(Request $request) {

        if($request->input('direction') && $request->input('direction') === 'Descending') {
            
            return 'DESC';
        }

        return 'ASC';
    }
}