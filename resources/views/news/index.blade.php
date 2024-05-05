@extends('layouts.app')
@section('title')
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @elseif(session('message2'))
        <div class="alert alert-info">
            {{session('message2')}}
        </div>
    @endif
    <a href="{{route('news.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Заголовок</th>
            <th>Рисунок</th>
            <th>Категория</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($all_news as $news)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$news->title}}</td>
                <td>
                    <img src="{{asset('images/'.$news->image)}}" width="100" alt="">
                </td>
                <td>{{$news->category->name}}</td>
                <td>{{$news->created_at}}</td>
                <td>{{$news->updated_at}}</td>

                <td>
                    <form action="{{route('news.destroy', $news->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('news.edit', $news->id)}}" method="GET">
                        @csrf
                        <input type="submit" value="Изменить" class="btn btn-info">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
@endsection
