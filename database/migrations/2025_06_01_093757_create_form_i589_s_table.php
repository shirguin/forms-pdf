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

        // Прочитать JSON-файл с описанием полей
        // $fieldsJson = File::get(database_path('data/form_i589_fields.json'));
        // $fields = json_decode($fieldsJson, true);

        //получаем данные о полях
        $fields = json_decode(
            file_get_contents(config_path('forms/form_fields_i-589.json')),
            true
        );

        Schema::create('form_i589_s', function (Blueprint $table) use ($fields) {
            $table->id();

            // Динамические поля из JSON
            foreach ($fields as $index => $field) {
                $type = $field['type'];
                $name = "field_" . $index;

                switch ($type) {

                    case 'Button':
                        $table->boolean($name)->nullable();
                        break;
                    case 'Text':
                        if (isset($field['FieldMaxLength']) && $field['FieldMaxLength'] > 0) {
                            $length = $field['FieldMaxLength'];
                        } else {
                            $length = 255; // Значение по умолчанию
                        }

                        $table->string($name, $length)->nullable();
                        break;
                }
            }

            $table->timestamps();
        });



        // Schema::create('form_i589_s', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email');
        //     // $table->text('message');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_i589_s');
    }
};
