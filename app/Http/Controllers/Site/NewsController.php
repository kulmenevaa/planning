<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('site.pages.news.index');
    }

    public function show($id) {
        return view('site.pages.news.show');
    }
}
