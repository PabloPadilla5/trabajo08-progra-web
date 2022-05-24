<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class MyPosts extends Component
{
    public function render()
    {
        // $posts = Post::where('user_id', auth()->user()->id)
        //         ->paginate(9);

        return view('livewire.my-posts');
    }
}
