<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->date('planned_delivery_date');
            
            // Checklist dokumen
            $table->boolean('has_invoice')->default(false);
            $table->boolean('has_faktur_pajak')->default(false);
            $table->boolean('has_surat_jalan')->default(false);
            $table->boolean('has_po')->default(false);
            $table->text('document_notes')->nullable();
            
            // Status
            $table->enum('status', ['draft', 'submitted', 'received'])->default('draft');
            
            // Penerimaan
            $table->timestamp('received_at')->nullable();
            $table->string('received_by')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};