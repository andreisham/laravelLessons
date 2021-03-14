@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Редактировать новость</h1> &nbsp;
            <strong><a href="{{ route('admin.news.index') }}">Список новостей</a></strong>
        </div>

        <!-- Content Row -->
        <div>
            <form action="{{ route('admin.news.update', ['news' => $news]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Наименование новости</label>
                    <input type="text" class="form-control" placeholder="title" name="title" value="{{ $news->title }}">
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
                    <textarea class="form-control"  name="description">{{ $news->description }}</textarea>
                    @if($errors->has('description'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('description') as $error)
                                <p style="margin-bottom: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Статус новости</label>
                    {{--                    не изменяется статус в БД  --}}
                    <select class="form-control" name="status" id="status">
                        <option>{{ $news->status }}</option>
                        <option>draft</option>
                        <option>published</option>
                        <option>blocked</option>
                    </select>
                </div>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>


@endsection
