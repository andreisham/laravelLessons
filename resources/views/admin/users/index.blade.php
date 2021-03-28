@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список пользователей</h1> &nbsp;
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
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Дата добавления</th>
                    <th>Права администратора</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->is_admin }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', ['user' => $user]) }}">Просмотр</a>&nbsp;
                            <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Редактировать</a>&nbsp;
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
            {{ $users->links() }}
        </div>
    </div>


@endsection
