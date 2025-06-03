@extends('layouts.app')

@section('title')
    Детальная формы i-589
@endsection

@section('content')
    <h1 class="ml-8 text-2xl font-bold">Детальная формы i-589</h1>
        <div class="mt-4 ml-8">
            <h2 class="text-xl font-semibold">{{ $data->name }}</h2>
            <p>Email: {{ $data->email }}</p>
            <p>Дата заполнения: {{ $data->created_at->format('d.m.Y H:i') }}</p>
            <a href="{{ route('form-i-589-update', $data->id) }}" class="text-blue-600 hover:underline">Редактировать</a>
            <a href="{{ route('form-i-589-delete', $data->id) }}" class="text-blue-600 hover:underline">Удалить</a>
        </div>
        <hr class="my-4"> 

@endsection