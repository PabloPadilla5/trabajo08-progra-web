@extends('layouts.template')

@section('content')
<div class="flex flex-col items-center">
    <h1 class="text-4xl py-2">
        Category: {{ $category->name }}
    </h1>

    <div class="max-w-7xl mx-auto">
        <div class="pt-0 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
            @foreach ($posts as $post)
                <x-card-post :post="$post" />
            @endforeach
        </div>
    </div>
</div>

<style>
  .pagination {
    list-style: none;
    padding-left: 0;
    text-align: center;
  }

  .pagination li {
    display: inline-block;
  }

  .pagination li+li {
    margin-left: 0.5rem;
  }

  .pagination a {
    text-decoration: none;
    padding: 8px;
    color: #2563EB;
    border: 2px solid #2563EB;
    border-radius: 999px;
  }

  .active {
    padding: 8px;
    border-radius: 999px;
    color: white;
    background-color: #2563EB;
  }

  .disabled {
    padding: 8px;
    border-radius: 999px;
    color: #2563EB;
    border: 2px solid #2563EB;
  }
</style>
<div class="pagination w-full py-3 mb-20">
  {{ $posts->links() }}
</div>
@endsection