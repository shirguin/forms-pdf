@extends('layouts.app')

@section('title')
    Заполненные формы i-589
@endsection

@section('content')
    <h1 class="ml-8 text-2xl font-bold">Заполненные формы i-589</h1>

    @foreach ($data as $el)
        <div class="mt-4 ml-8">
            <hr class="my-4">
            <h2 class="text-xl font-semibold">{{ $el->field_4 }} {{ $el->field_5 }} {{ $el->field_6 }}</h2>
            <p>Дата заполнения: {{ $el->created_at->format('d.m.Y H:i') }}</p>
            <p>ID заполненной формы в БД: {{ $el->id }}</p>

            <div class="mt-4">
                <a href="{{ route('form-i-589-detail', $el->id) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Просмотреть</a>
                <a href="{{ route('form-i-589-update', $el->id) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Редактировать</a>
                <a href="{{ route('form-i-589-delete', $el->id) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Удалить</a>
                <a href="{{ route('form-i-589-create-pdf', $el->id) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Сформировать PDF файл</a>
            </div>
            <hr class="my-4">
        </div>
    @endforeach
@endsection
