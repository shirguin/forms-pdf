@extends('layouts.app')

@section('title')
    Форма i-589
@endsection

@section('content')
    <h1 class="ml-8 text-2xl font-bold">Заполнение формы i-589</h1>



    <form action="{{ route('form-i-589-submit') }}" method="post" class="mt-4">
        @csrf
        <div class=" ml-8 mt-8 mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Ваше имя</label>
            <input type="text" id="name" name="name" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 w-xs">
        </div>

        <div class="ml-8 mt-8 mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Ваш email</label>
            <input type="email" id="email" name="email" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 w-xs">
        </div>

        <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 ml-8 mb-4">Отправить</button>

    </form>
@endsection
