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

    public function allData()
    {
        return view('list-form-i-589', ['data' => FormI589::all()]);
    }
}
