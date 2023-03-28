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
        Schema::create('open_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid("customer_id")->references("id")->on("customers");
            $table->string("stock_symbol");
            $table->foreign("stock_symbol")->references("symbol")->on("stocks");
            $table->string("order_type");
            $table->integer("order_quantity");
            $table->decimal("order_price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_orders');
    }
};
