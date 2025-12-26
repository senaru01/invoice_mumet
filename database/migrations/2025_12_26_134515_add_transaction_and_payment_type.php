<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('purchase_order_items', function (Blueprint $table) {
            $table->enum('transaction_type', ['barang', 'jasa'])->default('barang')->after('total_price');
        });
        
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->enum('payment_type', ['full', 'dp', 'termin_2', 'pelunasan'])->default('full')->after('total_price');
            $table->decimal('payment_percentage', 5, 2)->nullable()->after('payment_type')->comment('Percentage of total for DP/Termin');
        });
    }

    public function down(): void
    {
        Schema::table('purchase_order_items', function (Blueprint $table) {
            $table->dropColumn('transaction_type');
        });
        
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn(['payment_type', 'payment_percentage']);
        });
    }
};