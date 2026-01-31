<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index() {
        $contents = Content::latest()->get();
        
        return view('gallery.index', compact('contents'));
    }
}
