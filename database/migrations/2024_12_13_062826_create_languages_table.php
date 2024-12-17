<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Misal: en, id, fr, etc.
            $table->string('name'); // Nama bahasa, misal: English, Indonesia, French, etc.
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('languages');
    }
    
};
