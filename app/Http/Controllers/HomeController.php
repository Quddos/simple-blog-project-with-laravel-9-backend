<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // $allCategories =['Category 1','Category 2'];
        // $allCategories = DB::table ('categories')->get();
        $categories = Category::all();
        // $posts = Post::latest()->get();

        // $posts = Post::where('category_id', request('category_id'))
        // ->latest()
        // ->get();

        $posts = Post::when(request('category_id'),function($query){
            $query->where('category_id', request('category_id'));
        })
            
        ->latest()
        ->get();



        // return view('index', ['categories' => $allCategories]);
        return view('index', compact('categories', 'posts'));
    }
}
