<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //php codeて、create/modify/update -> database table, schema
    public function up(): void //up : table, column, indexの追加
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //追加
            $table->text('body'); //追加
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void　//up() methodでやった作業をrollback
    {
        Schema::dropIfExists('posts');
    }
};
