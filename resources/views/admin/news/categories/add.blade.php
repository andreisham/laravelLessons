@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить категорию</h1> &nbsp;
            <strong><a href="{{ route('admin.categories.index') }}">Список категорий</a></strong>
        </div>

        <!-- Content Row -->
        <div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Наименование категории</label>
                    <input type="text" class="form-control" placeholder="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control"  name="description"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>


@endsection
