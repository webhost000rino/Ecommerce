<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('total_price', 15, 2); // Total harga dengan 2 desimal
            $table->timestamp('purchase_date')->useCurrent();
            $table->string('alamat')->nullable(); // Tambahkan kolom alamat
            $table->string('payment_method');
            $table->string('status')->default('in-process'); // Status pembelian
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_history');
    }
}
