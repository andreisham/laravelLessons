@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить источник</h1> &nbsp;
            <strong><a href="{{ route('admin.sources.index') }}">Список источников</a></strong>
        </div>

        <!-- Content Row -->
        <div>
            <form action="{{ route('admin.sources.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Название источника</label>
                    <input type="text" class="form-control" placeholder="title" name="title">
                    @if($errors->has('title'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('title') as $error)
                                <p style="margin-bottom: 0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="url">Адрес источника (url)</label>
                    <input type="text" class="form-control" placeholder="http://..." name="url">
                    @if($errors->has('url'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('url') as $error)
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
