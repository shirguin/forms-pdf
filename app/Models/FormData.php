<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;

    protected $fillable = ['form_json'];

    protected $casts = [
        'form_json' => 'array', // Автоматическое преобразование JSON <-> массив PHP
    ];
}
