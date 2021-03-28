@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Редактировать пользователя</h1> &nbsp;
            <strong><a href="{{ route('admin.users.index') }}">Список пользователей</a></strong>
        </div>

        <!-- Content Row -->
        <div>
            <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Имя пользователя</label>
                    <input type="text" class="form-control" placeholder="name" name="name" value="{{ $user->name }}">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('name') as $error)
                                <p style="margin-bottom: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <textarea class="form-control"  name="email">{{ $user->email }}</textarea>
                    @if($errors->has('email'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('email') as $error)
                                <p style="margin-bottom: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="is_admin">Права администратора</label>
                    <select class="form-control" name="is_admin" id="is_admin">
                        <option>{{ $user->is_admin }}</option>
                        <option>1</option>
                        <option>0</option>
                    </select>
                </div>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>


@endsection
