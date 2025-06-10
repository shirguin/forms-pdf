@extends('layouts.app')

@section('title')
    Детальная формы i-589
@endsection

@section('content')
    <h1 class="ml-8 text-2xl font-bold">Просмотр формы i-589</h1>
    <div class="mt-4 ml-8">
        <h2 class="text-xl font-semibold">{{ $data_value->field_4 }} {{ $data_value->field_5 }} {{ $data_value->field_6 }}
        </h2>
        <p>Дата заполнения: {{ $data_value->created_at->format('d.m.Y H:i') }}</p>
        <p>ID заполненной формы в БД: {{ $data_value->id }}</p>

        <div class="mt-4">

            <a href="{{ route('form-i-589-update', $data_value->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Редактировать</a>
            <a href="{{ route('form-i-589-delete', $data_value->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Удалить</a>
        </div>

    </div>
    

    <div class="space-y-6 p-8">
        <hr class="my-4">
        @php $index = 0 @endphp
        @foreach ($data as $field)
            <div class="form-group">
                <!-- Если перед полем есть секция -->
                @if (!empty($field['section_en']) || !empty($field['section_ru']))
                    <div class="bg-gray-100 p-4 rounded-lg mb-4">
                        @if (!empty($field['section_en']))
                            <h2 class="font-bold text-lg">{{ $field['section_en'] }}</h2>
                        @endif
                        @if (!empty($field['section_ru']))
                            <h2 class="font-bold text-lg">{{ $field['section_ru'] }}</h2>
                        @endif
                    </div>
                @endif

                <!-- Если перед полем есть примечание -->
                @if (!empty($field['note_en']) || !empty($field['note_ru']))
                    <div class="mb-4">
                        @if (!empty($field['note_en']))
                            <p class="block text-sm font-medium text-gray-700">{{ $field['note_en'] }}</p>
                        @endif
                        @if (!empty($field['note_ru']))
                            <p class="block text-sm font-medium text-gray-700">{{ $field['note_ru'] }}</p>
                        @endif
                    </div>
                @endif

                <!-- Если перед полем есть подсекция -->
                @if (!empty($field['sub_section_en']) || !empty($field['sub_section_ru']))
                    <div class="mb-4">
                        @if (!empty($field['sub_section_en']))
                            <p class="block text-sm font-medium text-gray-700">{{ $field['sub_section_en'] }}</p>
                        @endif
                        @if (!empty($field['sub_section_ru']))
                            <p class="block text-sm font-medium text-gray-700">{{ $field['sub_section_ru'] }}</p>
                        @endif
                    </div>
                @endif

                @php $name = 'field_' . $index @endphp

                <!-- Если чекбокс -->
                @if ($field['type'] == 'Button')
                    <div class="flex items-center gap-4">
                        <input type="checkbox" id="field_{{ $index }}" name="field_{{ $index }}"
                            value="1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            @if ($data_value[$name] == 1) ? checked @endif>
                        <div>
                            @if (!empty($field['label_en']))
                                <label for="field_{{ $index }}" class="ml-2 block text-sm text-gray-900"></label>
                                {{ $field['label_en'] }}
                                </label>
                            @endif

                            @if (!empty($field['label_ru']))
                                <label for="field_{{ $index }}" class="ml-2 block text-sm text-gray-900"></label>
                                {{ $field['label_ru'] }}
                                </label>
                            @endif
                        </div>
                    </div>
                @else
                    <!-- Если текст -->
                    @if (!empty($field['label_en']))
                        <label for="field_{{ $index }}" class="block text-sm font-medium text-gray-700">
                            {{ $field['label_en'] }}
                        </label>
                    @endif
                    @if (!empty($field['label_ru']))
                        <label for="field_{{ $index }}" class="block text-sm font-medium text-gray-700">
                            {{ $field['label_ru'] }}
                        </label>
                    @endif

                    <p
                        class="mt-1 block w-1/2 px-4 py-3 border-2 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 sm:text-sm">
                        {{ $data_value->$name }}</p>
                @endif






            </div>

            @php $index++ @endphp
        @endforeach

        <hr class="my-4">

        <div class="mt-4">

            <a href="{{ route('form-i-589-update', $data_value->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Редактировать</a>
            <a href="{{ route('form-i-589-delete', $data_value->id) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Удалить</a>
        </div>

    </div>
@endsection
