@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить категорию</h1> &nbsp;
            <strong><a href="{{ route('admin.news.index') }}">Список Новостей</a></strong>
        </div>

        <!-- Content Row -->
        <div>
            <form action="{{ route('admin.news.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_id">Выбор категории</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option>Выбрать</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Заголовок новости</label>
                    <input type="text" class="form-control"  name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание новости</label>
                    <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Изображение новости</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="description">Статус новости</label>
                    <select class="form-control" name="status" id="status">
                        <option>Выбрать</option>
                    </select>
                </div>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>


@endsection
