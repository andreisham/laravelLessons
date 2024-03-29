@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список новостей</h1> &nbsp;
            <strong><a href="{{ route('admin.news.create') }}">Добавить новость</a></strong>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <!-- Content Row -->
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }} (Количество категорий: {{ $news->categories->count() }})</td>
                        <td>{{ $news->description }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.news.show', ['news' => $news]) }}">Просмотр</a>&nbsp;
                            <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Редактировать</a>&nbsp;
                            <a href="">Удалить</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <h2>Записей нет</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
{{--            пагинация--}}
            {{ $newsList->links() }}
        </div>
    </div>


@endsection
