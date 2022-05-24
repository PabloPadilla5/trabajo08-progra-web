<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller {
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index() {
        $posts = Post::where('status', 2)->latest('id')->paginate(9);

        return view('home', compact('posts'));
    }

    public function show(Post $post) {
        $related = Post::where('category_id', $post->category_id)
                ->where('status', 2)
                ->where('id', '!=', $post->id)
                ->latest('id')
                ->take(4)
                ->get();

        return view('posts.show', compact('post', 'related'));
    }

    public function category(Category $category) {
        $posts = Post::where('category_id', $category->id)
                ->where('status', 2)
                ->latest('id')
                ->paginate(9);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag) {
        $posts = $tag->posts()
                ->where('status', 2)
                ->latest('id')
                ->paginate(9);

        return view('posts.tag', compact('posts', 'tag'));
    }

    public function myposts() {
        $posts = Post::where('user_id', Auth::id())
                ->paginate(9);

        return view('livewire.my-posts', compact('posts'));
    }

    public function create() {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:posts',
            'extract' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'file' => 'image',
        ]);

        $user_id = Auth::id();
        $slug = Str::slug($request->name);

        $post = Post::create(array_merge($request->all(), [
                'user_id' => $user_id, 
                'slug' => $slug, 
                'status' => 2,
            ])
        );

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
            
            $post->image()->create([
                'url' => $url,
            ]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        //$user = User::create(request(['name', 'email', 'password']));
        return redirect()->to('/');
        //return 'Correcto';
    }
}
