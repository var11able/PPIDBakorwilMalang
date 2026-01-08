<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $contents = collect([]);

        return view('home', [
            'contents' => $contents
        ]);
    }
}
