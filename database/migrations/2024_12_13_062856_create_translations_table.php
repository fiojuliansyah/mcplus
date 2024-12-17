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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->unsignedBigInteger('language_id'); // foreign key ke languages
            $table->text('translation');
            $table->timestamps();
    
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('translations');
    }    
};
