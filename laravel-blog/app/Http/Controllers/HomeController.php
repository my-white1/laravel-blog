<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class HomeController extends Controller
{
    public function index(Category $category , Request $request)
    {
        $categories = Category::all();
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        
        
        $posts = Post::when(request('category_id') , function ($query){
            return $query->where('category_id', request('category_id'));
        })->when(request('search') , function ($query){
            return $query->where( 'title' , request('search'));
        })
        ->paginate(6);

        return view('home.index' , compact('categories' , 'posts'));
    }

    public function show(Post $post){
        return view('posts.show' , compact('post'));
    }
}
