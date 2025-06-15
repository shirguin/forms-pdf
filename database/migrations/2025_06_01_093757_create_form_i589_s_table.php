<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //получаем данные о полях
        $fields = json_decode(
            file_get_contents(config_path('forms/form_fields_i-589.json')),
            true
        );

        Schema::create('form_i589_s', function (Blueprint $table) use ($fields) {
            $table->id();
            $table->json('form_data')->nullable();
            // // Динамические поля из JSON
            // foreach ($fields as $index => $field) {
            //     $type = $field['type'];
            //     $name = "field_" . $index;

            //     switch ($type) {

            //         case 'Button':
            //             $table->boolean($name)->nullable();
            //             break;
            //         case 'Text':
            //             if (isset($field['FieldMaxLength']) && $field['FieldMaxLength'] > 0) {
            //                 $length = $field['FieldMaxLength'];
            //                 $table->string($name, $length)->nullable();
            //             } else {
            //                 $length = 10;
            //                 $table->string($name, $length)->nullable();
            //                 // $table->text($name)->nullable();
            //             }

            //             break;
            //     }
            // }

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
