<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 80)->unique();
            $table->string('state', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::dropIfExists('authors');
    }
};
