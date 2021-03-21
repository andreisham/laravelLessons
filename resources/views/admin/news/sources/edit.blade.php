@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Редактировать источник</h1> &nbsp;
            <strong><a href="{{ route('admin.sources.index') }}">Список источников</a></strong>
        </div>

        <!-- Content Row -->
        <div>
            <form action="{{ route('admin.sources.update', ['source' => $source]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Название источника</label>
                    <input type="text" class="form-control" placeholder="title" name="title" value="{{ $source->title }}">
                </div>
                <div class="form-group">
                    <label for="url">Адрес источника</label>
                    <textarea class="form-control"  name="url">{{ $source->url }}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>


@endsection
