<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>'index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '-' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been added!');


    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Response
     */
    public function show($slug)
    {
        return view('blog.show')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $slug
     * @return Response
     */
    public function edit($slug)
    {
        return view('blog.edit')->with('post',Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $slug
     * @return Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            //'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        Post::where('slug',$slug)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            //'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug',$slug);
        $post->delete();

        return redirect('/blog')->with('message', 'Your post has been deleted!');

    }
}
