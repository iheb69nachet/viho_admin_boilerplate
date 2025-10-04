<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation_keys', function (Blueprint $table) {
            $table->id();
            $table->string('parent_key')->nullable(); // Parent key for hierarchical structure
            $table->string('key');  // Key for individual translation
            $table->text('value');  // Value for the key
            $table->timestamps();

            $table->unique(['parent_key', 'key']); // Ensure unique key per parent key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translation_keys');
    }
}
