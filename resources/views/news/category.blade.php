@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($listNews['news'] as $key => $news)
                <div class="post-preview">
                    <a href="{{route('news.show',  ['id' => $key])}}">
                        <h2 class="post-title">
                            {{$news['title']}}
                        </h2>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">{{$news['author']}}</a>
                        {{$news['created_at']->format('d-m-Y')}}</p>
                </div>
                <hr>
        @endforeach
        <!-- Pager -->
            <div class="d-flex justify-content-between">
                <div class="clearfix">
{{--                    Должен возвращаться не на предыдущую страницу, а на уровень выше--}}
                    <a class="btn btn-primary " href="{{URL::previous()}}">Назад &larr;</a>
                </div>
                <div class="clearfix">
                    <a class="btn btn-primary " href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>

@endsection
