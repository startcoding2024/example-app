@extends('layouts.app')
@section('title')
    Добавления студента
@endsection

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('student.store')}}" method="post">
            @csrf
        <label for="">Имя:</label>
        <input type="text" name="name" class="form-control">
        <label for="">Фамилия:</label>
        <input type="text" name="surname" class="form-control">
        <label for="">Курс:</label>
        <input type="text" name="course" class="form-control">
        <label for="">Тел:</label>
        <input type="text" name="phone" class="form-control">
        <input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>

@endsection

@section('footer')
@endsection
