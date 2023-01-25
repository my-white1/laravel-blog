<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use SebastianBergmann\Type\VoidType;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return view('admin.post.index' , compact('categories' , 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categories)
    {
        $categories = Category::all();
        return view('admin.post.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            // 'category_id' => 'required',
        ]);

        // dd($request->input('title') , $request->input('description') , $request->input('category_id'));

        Post::create($request->all());

        session(['alert' => __('Post Created :)')]);

        return redirect()->route('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        session(['alert' => __('Post Updated :)')]);

        return redirect()->route('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();        

        session(['alert' => __('Post Deleted :(')]);

        return redirect()->route('post');
    }
}
