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
            // Добавляем поле для связи с пользователем
            $table->unsignedBigInteger('id_user')->comment('ID пользователя, которому принадлежит форма');
            $table->json('form_data')->nullable();
            $table->timestamps();
            // Добавляем внешний ключ для связи с таблицей users
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Каскадное удаление - при удалении пользователя удаляются его формы
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
