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
        Schema::create('bank_list', function (Blueprint $table) {
            $table->integer("code")->unique()->primary();
            $table->string("name");
            $table->decimal("min_withdraw");
            $table->decimal("max_withdraw");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_list');
    }
};
