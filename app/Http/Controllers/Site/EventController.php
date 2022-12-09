<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        return view('site.pages.events.index');
    }

    public function show($id) {
        return view('site.pages.events.show');
    }
}
