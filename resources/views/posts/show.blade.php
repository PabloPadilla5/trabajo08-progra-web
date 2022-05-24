@extends('layouts.template')

@section('content')
    <div class="container px-8 max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold">
            {{ $post->name }}
        </h1>

        <div class="mb-2 text-gray-500">
            {{ $post->extract }}
        </div>

        <div class="grid sm:grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <figure>
                    @if($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{asset('storage/')}} /{{$post->image->url}}" alt="Imagen">
                    @endif
                </figure>
                
                <div class="text-lg mt-1">
                    {{ $post->body }}
                </div>
            </div>

            <aside class="bg-blue-100 p-3 rounded-lg mb-5">
                <h1 class="text-2xl mb-2 font-bold">
                    More in {{ $post->category->name }}
                </h1>

                <ul>
                    @foreach ($related as $item)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $item) }}">
                                @if ($item->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{asset('storage/')}} /{{$item->image->url}}" alt="Imagen">
                                @endif
                                <p class="ml-2 underline">
                                    {{ $item->name }}
                                </p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
@endsection