@extends('layouts.admin')
@section('content')
    <h2>{{ $category->title }}</h2>
    <p>{{ $category->description }}</p>
@endsection
