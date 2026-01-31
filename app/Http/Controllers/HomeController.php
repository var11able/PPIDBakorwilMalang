<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $contents = Content::latest()->take(3)->get();
    
        return view('home.index', compact('contents'));
    }
}
