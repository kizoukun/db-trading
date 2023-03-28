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
        Schema::create('customers_bank_list', function (Blueprint $table) {
            $table->id();
            $table->uuid("customer_id");
            $table->integer("bank_code");
            $table->integer("account_no");
            $table->foreign("customer_id")->references("id")->on("customers");
            $table->foreign("bank_code")->references("code")->on("bank_list");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_bank_list');
    }
};
