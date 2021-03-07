@extends('layouts.admin')
@section('content')
    <h2>{{ $news->title }}</h2>
    <p>{{ $news->description }}</p>
@endsection
