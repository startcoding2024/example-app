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
    <table class="table">
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Курс</th>
            <th>Номер телефона</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->surname}}</td>
            <td>{{$student->course}}</td>
            <td>{{$student->phone}}</td>
            <td>
                <form action="{{route('student.destroy', $student->id)}}" method="post">
                    @csrf
                    @method('delete')
                <input type="submit" value="Удалить" class="btn btn-danger">
                </form>
            </td>
            <td>
                <form action="{{route('student.edit', $student->id)}}" method="GET">
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
