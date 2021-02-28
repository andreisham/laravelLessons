@extends('layouts.main')

@section('title')
    {{$news['title']}} @parent
@endsection

@section('header')
    {{$news['title']}}
@endsection

@section('content')

            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            {{$news['text']}}
                        </div>
                    </div>
                </div>
            </article>
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <a class="btn btn-primary " href="{{URL::previous()}}">Назад &larr;</a>
                </div>
                <div class="clearfix">
                    <a class="btn btn-primary " href="{{route('admin.news.index')}}">В админку</a>
                </div>
            </div>
@endsection

