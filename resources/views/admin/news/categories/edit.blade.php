@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Редактировать категорию</h1> &nbsp;
            <strong><a href="{{ route('admin.categories.index') }}">Список категорий</a></strong>
        </div>

        <!-- Content Row -->
        <div>
            <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Наименование категории</label>
                    <input type="text" class="form-control" placeholder="title" name="title" value="{{ $category->title }}">
                    @if($errors->has('title'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('title') as $error)
                                <p style="margin-bottom: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control"  name="description">{{ $category->description }}</textarea>
                    @if($errors->has('description'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('description') as $error)
                                <p style="margin-bottom: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>


@endsection
