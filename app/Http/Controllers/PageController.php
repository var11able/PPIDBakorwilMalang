<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($prefix, $slug) {
        $menus = collect(config('navigation.main'))
            ->pluck('items')
            ->flatten(1);

        $item = $menus->firstWhere('slug', $slug);
        abort_if(!$item, 404);

        $view = $prefix . '.' . ($item['view'] ?? $slug);

        abort_unless(view()->exists($view), 404);

        return view($view);
    }
}
