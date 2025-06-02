@extends('layouts.app')

@section('title')
    Заполненные формы i-589
@endsection

@section('content')
    <h1 class="text-2xl font-bold">Заполненные формы i-589</h1>
    @foreach($data as $el)
        <div class="mt-4 ml-8">
            <h2 class="text-xl font-semibold">{{ $el->name }}</h2>
            <p>Email: {{ $el->email }}</p>
            <p>Дата заполнения: {{ $el->created_at->format('d.m.Y H:i') }}</p>
            <a href="{{ route('form-i-589-edit', $el->id) }}" class="text-blue-600 hover:underline">Редактировать</a>
        </div>
        <hr class="my-4"> 

    @endforeach

@endsection