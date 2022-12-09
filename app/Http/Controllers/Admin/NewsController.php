<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.news.index');
    }

    public function getAllNews() 
    {
        $news = News::all();
        return response()->json([
            'news' => NewsResource::collection($news)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $created = News::create($request->all());
        if($created) {
            return response()->json([
                'message' => 'Новость создана',
                'news'    => $created
            ], 200);
        } 
        return response()->json([
            'message' => 'Произошла ошибка!'
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $data = $request->all();
        $data['updated_at'] = date('d.m.Y H:i:s');
        $news = News::where('id', $id)->first();
        $updated = $news->update($data);
        if($updated) {
            return response()->json([
                'message'   => 'Новость успешно обновлена!',
                'news'      => $news
            ], 200);
        }
        return response()->json([
            'message' => 'Произошла ошибка!'
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if($news->delete()) {
            Storage::delete('news/' . $news->image);
            return response()->json([
                'message' => 'Новость успешно удалена!'
            ], 200);
        }
    }
}
