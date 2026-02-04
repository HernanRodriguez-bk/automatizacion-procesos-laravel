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
    Schema::create('registros', function (Blueprint $table) {
        $table->id();
        $table->string('codigo')->unique();
        $table->string('nombre');
        $table->string('email');
        $table->date('fecha');
        $table->string('estado');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
