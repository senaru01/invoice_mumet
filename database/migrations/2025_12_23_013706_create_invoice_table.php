<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');
            
            // Invoice Details
            $table->string('no_seri_fp'); // No Faktur Pajak
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->string('currency', 3)->default('IDR');
            
            // Amount Breakdown
            $table->decimal('barang', 15, 2)->default(0);
            $table->decimal('jasa', 15, 2)->default(0);
            $table->decimal('discount', 15, 2)->default(0);
            $table->decimal('subtotal1', 15, 2)->default(0); // barang + jasa - discount
            $table->decimal('tax', 15, 2)->default(0); // 11% dari subtotal1
            $table->decimal('subtotal2', 15, 2)->default(0); // subtotal1 + tax
            $table->decimal('pph23', 15, 2)->default(0); // PPh pasal 23 (jika jasa)
            $table->decimal('grand_total', 15, 2)->default(0); // subtotal2 - pph23
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};