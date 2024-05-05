<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() // Список всех новостей
    {
      // $all_news =  News::all();
       $all_news =  News::with('category')->get();
       return view('news.index',compact('all_news'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $fileName="";
        if ($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $fileName);
        }
        News::create([
            'title'=> $request->title,
            'text'=> $request->text,
            'image'=> $fileName,
            'category_id'=> $request->category_id,
        ]);
        //News::create($request->all());
        dd($request->all());
    }

    public function edit()
    {

    }
    public function update()
    {

    }

    public function destroy()
    {

    }
}
