@extends('layouts.app')
@section('title')
    Изменения студента
@endsection

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('student.update', $student)}}" method="post">
            @csrf
            @method('put')
            <label for="">Имя:</label>
            <input type="text" name="name" value="{{$student->name}}" class="form-control">
            <label for="">Фамилия:</label>
            <input type="text" name="surname"  value="{{$student->surname}}"class="form-control">
            <label for="">Курс:</label>
            <input type="text" name="course" value="{{$student->course}}" class="form-control">
            <label for="">Тел:</label>
            <input type="text" name="phone" value="{{$student->phone}}" class="form-control">
            <input type="submit" value="Изменить" class="btn btn-primary form-control">
        </form>
    </div>

@endsection

@section('footer')
@endsection
