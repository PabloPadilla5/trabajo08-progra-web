@extends('layouts.template')

@section('content')
<div class="container mx-auto p-4 bg-white">
    <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
      <h1 class="text-lg font-bold">Create a new post</h1>

      <form action="{{ route('posts.upload-blog') }}" class="flex flex-col mt-4" enctype="multipart/form-data" method="POST">
        @csrf
        <label class="" for="name">Title</label>
        <input
            type="text"
            name="name"
            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
            placeholder="Your post's title"
        />
        @error('name')
          <div class="flex items-center leading-normal text-red-600" role="alert">
            <p>* {{ $message }}</p>
          </div>
        @enderror

        <div class="mt-3 flex flex-col w-full">
            <label class="" for="category_id">Category</label>

            {!! Form::select('category_id', $categories, null) !!}

            {{-- <select class="mt-3" name="category_id" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select> --}}
        </div>

        <label class="mt-3">Tags</label>
        <div class="flex flex-wrap gap-3 w-full ">
            @foreach ($tags as $tag)
                <label>
                  {!! Form::checkbox('tags[]', $tag->id, null) !!}
                  {{ $tag->name }}
                    {{-- <input type="checkbox" id="{{ $tag->name }}" name="tags[]"> --}}
                    {{-- <label for="{{ $tag->name }}">{{ $tag->name }}</label> --}}
                </label>
            @endforeach
        </div>
        @error('tags')
          <div class="flex items-center leading-normal text-red-600" role="alert">
            <p>* {{ $message }}</p>
          </div>
        @enderror

        <div class="flex flex-col w-full mt-3">
          <img id="picture" src="" alt="Select an image">
          <input id="file" name="file" type="file" accept="image/*">
        </div>
        @error('file')
          <div class="flex items-center leading-normal text-red-600" role="alert">
            <p>* {{ $message }}</p>
          </div>
        @enderror

        <label class="mt-4" for="extract">Extract</label>
        <textarea
            type="text"
            name="extract"
            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
            placeholder="Write a small description of your post"
        ></textarea>
        @error('extract')
          <div class="flex items-center leading-normal text-red-600" role="alert">
            <p>* {{ $message }}</p>
          </div>
        @enderror

        <label class="mt-4" for="body">Content</label>
        <textarea
            type="text"
            name="body"
            class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
            placeholder="Something interesting..."
        ></textarea>
        @error('body')
          <div class="flex items-center leading-normal text-red-600" role="alert">
            <p>* {{ $message }}</p>
          </div>
        @enderror

        <button
            type="submit"
            class="mt-4 px-4 py-3  leading-6 text-base rounded-md border border-transparent text-white focus:outline-none bg-blue-500 text-blue-100 hover:text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer inline-flex items-center w-full justify-center items-center font-medium focus:outline-none"
        >
          Post
        </button>
      </form>
    </div>
  </div>

<script>
  document.getElementById('file').addEventListener('change', changeImage);

  function changeImage(event) {
    var file = event.target.files[0];

    var reader = new FileReader();
    reader.onload = (event) => {
      document.getElementById("picture").setAttribute('src', event.target.result);
    };

    reader.readAsDataURL(file);
  }
</script>
@endsection