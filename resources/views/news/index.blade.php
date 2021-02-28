@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($listCategory as $key => $category)
                <div class="post-preview">
                    <a href="{{route('news.category', ['category_id' => $key])}}">
                        <h2 class="post-title">
                            {{$category['title']}}
                        </h2>
                    </a>
                </div>
                <hr>
            @endforeach
        </div>
    </div>

@endsection
