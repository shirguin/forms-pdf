<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormI589Request;
use App\Models\FormI589;

class FormI589Controller extends Controller
{
    public function submit(FormI589Request $request)
    {
        $form = new FormI589();
        $form->name = $request->input('name');
        $form->email = $request->input('email');

        $form->save();
        return redirect()->route('home')->with('success', 'Данные формы успешно сохранены!');
    }

        public function updateFormSubmit($id, FormI589Request $request)
    {
        $form = FormI589::find($id);
        $form->name = $request->input('name');
        $form->email = $request->input('email');

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
        $form = new FormI589();
        return view('form-i-589-update', ['data' => $form->find($id)]);
    }

        public function deleteForm($id)
    {
        FormI589::find($id)->delete();
        return redirect()->route('form-i-589-list')->with('success', 'Форма была удалена');
    }
}
