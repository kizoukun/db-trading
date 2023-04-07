<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_bank_list', function (Blueprint $table) {
            $table->id();
            $table->uuid("user_id");
            $table->unsignedBigInteger("bank_id");
            $table->integer("account_no");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("bank_id")->references("id")->on("bank_list");
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_bank_list');
    }
};
