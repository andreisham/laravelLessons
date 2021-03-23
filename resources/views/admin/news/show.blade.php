@extends('layouts.admin')
@section('content')
    <h2>{{ $user->name }}</h2>
    <p>{{ $user->email }}</p>
    <p>Администратор: {{ $user->is_admin }}</p>
@endsection
