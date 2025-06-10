<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormI589Request;
use App\Models\FormI589;
use phpDocumentor\Reflection\Types\Boolean;

class FormI589Controller extends Controller
{
    public function showForm()
    {
        $fields_data = json_decode(
            file_get_contents(config_path('forms/form_fields_i-589.json')),
            true
        );

        return view('form-i-589', ['data' => $fields_data]);
    }

    // public function submit(FormI589Request $request)
    public function submit(Request $request)
    {
        //получаем данные о полях
        $fields_data = json_decode(
            file_get_contents(config_path('forms/form_fields_i-589.json')),
            true
        );

        //Получаем значения полей
        $dataForm = $request->all();
        unset($dataForm['_token']);

        // Заполняем отсутствующие чекбоксы значением "0"
        foreach ($fields_data as $index => $field) {
            if (!isset($dataForm["field_$index"])) {
                if ($field['type'] == "Button") {
                    $dataForm["field_$index"] = "0";
                }
            }
        }

        //Сортируем по ключу
        uksort($dataForm, function ($a, $b) {
            // Извлекаем числа из ключей (field_123 → 123)
            $numA = (int) substr($a, strpos($a, '_') + 1);
            $numB = (int) substr($b, strpos($b, '_') + 1);

            return $numA <=> $numB;
        });

        //Формируем массив правил для валидации полей
        $arValid = [];
        foreach ($fields_data as $index => $field) {

            if ($field['type'] == "Button") {
                $arValid["field_$index"] = ['Boolean'];
            } else {
                if ($field['FieldMaxLength'] > 0) {
                    $arValid["field_$index"] = ['String', 'nullable', 'max:' . $field['FieldMaxLength']];
                } else {
                    $arValid["field_$index"] = ['String', 'nullable', 'max:255'];
                }
            }
        }

        //Валидация
        $validatedData = $request->validate($arValid);

        $form = new FormI589();
        foreach ($dataForm as $name => $value) {
            $form->$name = $value;
        }

        $form->save();
        return redirect()->route('home')->with('success', 'Данные формы успешно сохранены!');
    }

    // public function updateFormSubmit($id, FormI589Request $request)
    public function updateFormSubmit($id, Request $request)
    {
        //получаем данные о полях
        $fields_data = json_decode(
            file_get_contents(config_path('forms/form_fields_i-589.json')),
            true
        );

        //Получаем значения полей
        $dataForm = $request->all();
        unset($dataForm['_token']);

        // Заполняем отсутствующие чекбоксы значением "0"
        foreach ($fields_data as $index => $field) {
            if (!isset($dataForm["field_$index"])) {
                if ($field['type'] == "Button") {
                    $dataForm["field_$index"] = "0";
                }
            }
        }

        //Сортируем по ключу
        uksort($dataForm, function ($a, $b) {
            // Извлекаем числа из ключей (field_123 → 123)
            $numA = (int) substr($a, strpos($a, '_') + 1);
            $numB = (int) substr($b, strpos($b, '_') + 1);

            return $numA <=> $numB;
        });

        //Формируем массив правил для валидации полей
        $arValid = [];
        foreach ($fields_data as $index => $field) {

            if ($field['type'] == "Button") {
                $arValid["field_$index"] = ['Boolean'];
            } else {
                if ($field['FieldMaxLength'] > 0) {
                    $arValid["field_$index"] = ['String', 'nullable', 'max:' . $field['FieldMaxLength']];
                } else {
                    $arValid["field_$index"] = ['String', 'nullable', 'max:255'];
                }
            }
        }

        //Валидация
        $validatedData = $request->validate($arValid);

        $form = FormI589::find($id);

        foreach ($dataForm as $name => $value) {
            $form->$name = $value;
        }

        $form->save();
        return redirect()->route('form-i-589-detail', $id)->with('success', 'Данные формы обновлены!');
    }

    public function getAll()
    {
        $form = new FormI589();
        return view('form-i-589-list', ['data' => $form->all()]);
    }

    public function getById($id)
    {
        $form = new FormI589();
        return view('form-i-589-detail', ['data' => $form->find($id)]);
    }

    public function updateForm($id)
    {
        $fields_data = json_decode(
            file_get_contents(config_path('forms/form_fields_i-589.json')),
            true
        );

        $form = new FormI589();
        return view('form-i-589-update', ['data' => $fields_data, 'data_value' => $form->find($id)]);
    }

    public function deleteForm($id)
    {
        FormI589::find($id)->delete();
        return redirect()->route('form-i-589-list')->with('success', 'Форма была удалена');
    }
}
