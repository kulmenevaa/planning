<?php

namespace App\Http\Controllers\Site;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        return view('site.pages.index');
    }

    public function getLastNews() 
    {
        $news = News::limit(3)->orderBy('created_at', 'desc')->get();
        return response()->json([
            'news' => NewsResource::collection($news)
        ], 200);
    }
}
