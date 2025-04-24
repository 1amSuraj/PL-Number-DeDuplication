<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->string('pl_number');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('price_lists');
    }
};