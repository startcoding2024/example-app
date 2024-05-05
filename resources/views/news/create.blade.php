@extends('layouts.app')
@section('title')
    Добавления
@endsection

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Заголовок:</label>
            <input type="text" name="title" class="form-control">
            <label for="">Текст:</label>
            <input type="text" name="text" class="form-control">
            <label for="">Категория:</label>
            <select name="category_id" id="" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <label for="">Рисунок:</label>
            <input type="file" name="image" class="form-control"><input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>

@endsection

@section('footer')
@endsection
