<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // // Прочитать JSON-файл с описанием полей
        // $fieldsJson = File::get(database_path('data/form_i589_fields.json'));
        // $fields = json_decode($fieldsJson, true);

        // Schema::create('form_i589_s', function (Blueprint $table) use ($fields) {
        //     $table->id();

        //     // Статические поля
        //     $table->string('name');
        //     $table->string('email');

        //     // Динамические поля из JSON
        //     foreach ($fields as $field) {
        //         $type = $field['type'];
        //         $name = $field['name'];

        //         switch ($type) {
        //             case 'string':
        //                 $length = $field['length'] ?? 255;
        //                 $table->string($name, $length)->nullable();
        //                 break;
        //             case 'text':
        //                 $table->text($name)->nullable();
        //                 break;
        //             case 'integer':
        //                 $table->integer($name)->nullable();
        //                 break;
        //             case 'boolean':
        //                 $table->boolean($name)->nullable();
        //                 break;
        //                 // Добавьте другие типы по необходимости
        //         }
        //     }

        //     $table->timestamps();
        // });



        Schema::create('form_i589_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            // $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_i589_s');
    }
};
