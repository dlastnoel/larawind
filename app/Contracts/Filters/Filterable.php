<?php

namespace App\Contracts\Filters;
use Illuminate\Http\Request;

interface Filterable
{
    public static function get(Request $request);
}