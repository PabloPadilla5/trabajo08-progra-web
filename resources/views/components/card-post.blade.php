@props(['post'])

<div class="p-6 bg-white rounded-xl">
    {{-- Server --}}
    {{--{{ Storage::url($post->image->url) }}--}}

    {{-- Local --}}
    {{-- {{asset('storage/')}} /{{$post->image->url}} --}}
    <a
        href="{{ route('posts.show', $post) }}"
        class="group"
        >
        <div class="overflow-hidden">
        <!--<img
            src="https://images.unsplash.com/photo-1636467204130-edf8ee206dce?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
            class="w-full h-auto hover:scale-105 transition transition-all duration-200 ease-in-out"
            alt="Sample Cover"
            >-->

            @if($post->image)
                <img
                src="{{asset('storage/')}} /{{$post->image->url}}"
                class="w-full h-auto hover:scale-105 transition transition-all duration-200 ease-in-out"
                alt="Sample Cover"
                >
            @endif
        </div>

        <h3
            class="mt-6 leading-normal text-gray-800 group-hover:text-purple-400 font-semibold text-2xl lg:text-4xl line-clamp-3 transition translation-all duration-200 ease-in-out"
            title="Lorem Ipsum is simply dummy text of the printing"
            >
        {{ $post->name }}
        </h3>

        <div class="mt-3 bg-white flex flex-wrap gap-2">
        @foreach ($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="py-1 px-3 bg-gray-200 hover:bg-gray-300 rounded-full text-sm font-semibold text-gray-600">
                {{ $tag->name }}
            </a>
        @endforeach
        </div>
    </a>

    <div class="mt-3 mx-1">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
        <time class="text-gray-600" datetime="2021-11-06T08:29:56+00:00">
            {{ $post->created_at->format('M d, Y') }}
        </time>

        {{-- <a
            href="#"
            class="inline-block text-gray-600 hover:text-purple-400"
            >
            10 Comments
        </a> --}}

        <a
            href="#"
            class="flex items-center"
            >
            <div class="h-6 w-6 rounded-full bg-purple-400"></div>

            <span class="ml-2 text-gray-600">
            John Doe
            </span>
        </a>
        </div>

        <p class="mt-6 leading-normal line-clamp-3 text-lg text-gray-600">
        {{ $post->extract }}
        </p>
    </div>

    <a href="{{ route('posts.show', $post) }}" class="inline-block mt-6 text-purple-500 hover:text-purple-400">
        Read More
    </a>
</div>