<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index() {
        return view('site.pages.employers.index');
    }
}
