@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список источников</h1> &nbsp;
            <strong><a href="{{ route('admin.sources.create') }}">Добавить источник</a></strong>
        </div>

        <!-- Content Row -->
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Название</th>
                    <th>Адрес</th>
                    <th>Дата добавления</th>
                </tr>
                </thead>
                <tbody>
                @forelse($sources as $source)
                    <tr>
                        <td>{{ $source->id }}</td>
                        <td>{{ $source->title }}</td>
                        <td>{{ $source->url }}</td>
                        <td>{{ $source->created_at }}</td>
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
        </div>
    </div>


@endsection
