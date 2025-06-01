@extends('layouts.app')

@section('title')
    Главная страница
@endsection

@section('content')
    <h1 class="text-2xl font-bold">Главная страница</h1>
    <a class="text-blue-700" href="{{ route('form-i-589') }}">Заполнение формы i-589</a>
@endsection
